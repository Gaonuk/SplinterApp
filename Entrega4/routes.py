from flask import Flask, json, request
import pandas
import pymongo
from random import randint

uri = "mongodb://grupo15:grupo15@gray.ing.puc.cl/grupo15"
# La uri 'estándar' es "mongodb://user:password@ip/database"
client = pymongo.MongoClient(uri)
db = client.get_database()
db.messages.drop_indexes()
db.messages.create_index([("message", "text")])

app = Flask(__name__)

@app.route("/")
def hello_world():
  return "<h1>Hola</h1>"

@app.route("/users")
def all_users():
  users = [u for u in db.users.find({}, {"_id":0})]
  return json.jsonify(users)

@app.route("/messages")
def all_messages():
  user1 = request.args.get('id1')
  user2= request.args.get('id2')
  if user1==None or user2==None:
    messages = [m for m in db.messages.find({}, {"_id":0})]
    return json.jsonify(messages)
  else:
    messages = [m for m in db.messages.find({'receptant': {"$in":[int(user1), int(user2)]}, 'sender': {"$in":[int(user1), int(user2)]}}, {"_id":0})]
    return json.jsonify(messages)

@app.route("/users/<int:uid>")
def get_user(uid):
  user = list(db.users.find({"uid":uid}, {"_id":0}))
  return json.jsonify(user)

@app.route("/messages/<int:mid>")
def get_message(mid):
  message = list(db.messages.find({"mid":mid}, {"_id":0}))
  return json.jsonify(message)

@app.route("/messages", methods=['POST'])
def new_message():
    valido = True
    messages_keys = ['message', 'sender', 'receptant', 'lat', 'long', 'date']
    try:
        data = {key: request.json[key] for key in messages_keys}
        count = db.messages.count_documents({})
        data["mid"] = count + 2
    except:
        valido = False
        if 'message' in request.json:
            if 'sender' in request.json:
                if 'receptant' in request.json:
                    if 'lat' in request.json:
                        if 'long' in request.json:
                            error = 'falta agregar fecha'
                        else:
                            error = 'falta agregar longitud'
                    else:
                        error = 'falta agregar latitud'
                else:
                    error = 'falta agregar receptant'    
            else:
                error = 'falta agregar sender'
        else:
            error = 'falta agregar mensaje'
    if valido:
        for i in str(data['date']):
            if  i not in '-0123456789':
                error = 'formato de fecha no válido'
                valido = False
        for i in str(data['lat']):
            if  i not in '.-0123456789':
                error = 'formato de latitud no válido'
                valido = False
        for i in str(data['long']):
            if  i not in '.-0123456789':
                error = 'formato de longitud no válido'
                valido = False
        if isinstance(data['sender'], int):        
            uid = int(data['sender'])
            usuario_sender = db.users.find_one({"uid":uid}, {"_id":0})
            if usuario_sender is None:
                error = 'no existe un usuario con el id del sender'
                valido = False
        else:
            error = 'el formato del sender no es correcto'
            valido = False
        if isinstance(data['receptant'], int): 
            uid = int(data['receptant'])
            usuario_receptant = db.users.find_one({"uid":uid}, {"_id":0})
            if usuario_receptant is None:
                error = 'no existe un usuario con el id del receptant'
                valido = False
        else:
            error = 'el formato del receptant no es correcto'
            valido = False
    if valido:
        db.messages.insert_one(data)
        message = "mensaje creado"
        success = True
    else:
        message = "No se pudo crear el mensaje, {}".format(error)
        success = False
    return json.jsonify({'success': success, 'message': message})

@app.route("/messages/<int:mid>", methods=['DELETE'])
def delete_message(mid):
  db.messages.delete_one({"mid": mid})
  return "Mensaje eliminado"

@app.route('/text_search', methods=['POST'])
def busqueda_por_texto():
    data = request.json
    #Caso que sea el json sea vacio
    if not data:
        output = db.messages.find({}, {'_id': 0})
        return json.jsonify(list(output))
    #Required
    busqueda = list()
    try:
        required = ["\"" + x + "\"" for x in data["required"]]
        busqueda.extend(required)
    except KeyError:
        required = False
    #Forbidden
    try:
        forbidden = ["-" + x for x in data["forbidden"]]
        busqueda.extend(forbidden)
    except KeyError:
        pass
    #Desired
    try:
        desired = [f"\'{x}\'" for x in data["desired"]]
        busqueda.extend(desired)
    except KeyError:
        desired = False

    #Caso que solo existan Forbidden
    if not desired and not required:
        #Se crea una nueva collection
        db.messages.aggregate(([ {"$match": {}},
                                 {"$out": "forbidden"},
                                ]))
        #Se crea un valor dummy
        value_dummy =  randint(0, 64)
        while str(value_dummy) in [x[1:] for x in busqueda]:
            value_dummy += randint(0, 64)
        #Se agrega el valor dummy
        busqueda.append(str(value_dummy))
        db.forbidden.update_many({}, {'$set': {'dummy': str(value_dummy)}})
        #Se crean los index
        db.forbidden.drop_indexes()
        db.forbidden.create_index([('message', 'text'), ('dummy', 'text')])
        #Se ejecuta la consulta
        output = db.forbidden.find({ '$text': {'$search': ' '.join(busqueda)}},
        { 'score': { "$meta": 'textScore'}, '_id': 0, 'dummy': 0}).sort([('score', {'$meta': 'textScore'})])
        output = json.jsonify(list(output))
        db.drop_collection('forbidden')
        return output

    output = db.messages.find(
        { '$text': {'$search': ' '.join(busqueda)}},
        { 'score': { "$meta": 'textScore'}, '_id': 0}).sort([('score', {'$meta': 'textScore'})])
    return json.jsonify(list(output))


if __name__ == '__main__':
    app.run()