from flask import Flask, json, request
import pymongo
from random import randint
from datetime import date

uri = "mongodb://grupo15:grupo15@gray.ing.puc.cl/grupo15"
# La uri 'estándar' es "mongodb://user:password@ip/database"
client = pymongo.MongoClient(uri)
db = client.get_database()
db.messages.drop_indexes()
db.messages.create_index([("message", "text")])

app = Flask(__name__)
app.debug = True

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
    users = db.users.find({}, {"_id": 0})
    users = list(users)
    ids = [x['uid'] for x in users]
    if int(user1) not in ids or int(user2) not in ids:
        return f'Invalid ID, no users with Id = {user1, user2}'
    messages = [m for m in db.messages.find({'receptant': {"$in":[int(user1), int(user2)]}, 'sender': {"$in":[int(user1), int(user2)]}}, {"_id":0})]
    return json.jsonify(messages)

@app.route("/users/<int:uid>")
def get_user(uid):
  userId = uid
  users = db.users.find({}, {"_id": 0})
  users = list(users)
  ids = [x['uid'] for x in users]
  if userId not in ids:
    return f'Invalid ID, no user with Id = {userId}'
  user = list(db.users.find({"uid":uid}, {"_id":0}))
  mensajes_enviados = list(db.messages.find({"sender":uid}, {"_id":0}))
  mensajes_recibidos = list(db.messages.find({"receptant":uid}, {"_id":0}))
  return json.jsonify(user, "estos mensajes ha enviado este usuario:", mensajes_enviados, "estos mensajes ha recibido este usuario:", mensajes_recibidos)

@app.route("/messages/<int:mid>")
def get_message(mid):
  userId = mid
  messages = db.messages.find({}, {"_id": 0})
  messages = list(messages)
  ids = [x['mid'] for x in messages]
  if userId not in ids:
    return f'Invalid ID, no message with Id = {userId}'
  message = list(db.messages.find({"mid":mid}, {"_id":0}))
  return json.jsonify(message)

@app.route("/messages", methods=['POST'])
def new_message():
    valido = True
    messages_keys = ['receptant', 'sender', 'message']
    data = {key: request.json[key] for key in messages_keys}
    if data['receptant'] is False:
        valido = False
        error = 'falta agregar receptant'
    else:
        if data['message'] is False:
            valido = False
            error = 'falta agregar mensaje'
        else:
            usuario_receptant = db.users.find_one({"name":data['receptant']}, {"_id":0})
            if usuario_receptant is None:
                error = 'no existe un usuario con el username del receptant'
                valido = False
            else:
                data['receptant'] = usuario_receptant['uid']
                count = db.messages.count_documents({})
                data["mid"] = count + 2
                data['lat'] = -33.436947
                data['long'] = -70.634387
                fecha = date.today()
                fecha_str = fecha.strftime('%Y-%m-%d')
                data['date'] = fecha_str
    if valido:
        db.messages.insert_one(data)
        message = "mensaje enviado"
        success = True
    else:
        message = "No se pudo crear el mensaje, {}".format(error)
        success = False
    return json.jsonify({'success': success, 'message': message})

@app.route("/message/<int:mid>", methods=['DELETE'])
def delete_message(mid):
  userId = mid
  messages = db.messages.find({}, {"_id": 0})
  messages = list(messages)
  ids = [x['mid'] for x in messages]
  if userId not in ids:
    return f'Invalid ID, no message with Id = {userId}'
  db.messages.delete_one({"mid": mid})
  return "Mensaje eliminado"

@app.route('/text-search')
def busqueda_por_texto():
    try:
        data = request.json
    except Exception:
        data = []
    #Caso que sea el json sea vacio
    if not data:
        output = db.messages.find({}, {'_id': 0})
        return json.jsonify(list(output))
    #Required
    busqueda = list()
    try:
        required = ["\""+ x  + "\"" for x in data["required"]]
        busqueda.extend(required)
    except KeyError:
        required = False
    #Forbidden
    try:
        forbidden = ["-" + "\'" + x + "\'" for x in data["forbidden"]]
        busqueda.extend(forbidden)
    except KeyError:
        forbidden = False
    #Desired
    try:
        desired = [f"{x}" for x in data["desired"]]
        busqueda.extend(desired)
    except KeyError:
        desired = False

    try:
        userId = data["userId"]
        users = db.users.find({}, {"_id": 0})
        users = list(users)
        ids = [x['uid'] for x in users]
        if userId not in ids:
            return f'Invalid ID, no user with Id = {userId}'
    except KeyError:
        userId = False
    #Caso que solo existan Forbidden
    if not desired and not required and not forbidden and not userId:
        output = db.messages.find({}, {'_id': 0})
        return json.jsonify(list(output))

    if not desired and not required and forbidden:
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
        if userId:
            output = db.forbidden.find({ '$text': {'$search': ' '.join(busqueda)}, 'sender': userId},
            { 'score': { "$meta": 'textScore'}, '_id': 0, 'dummy': 0}).sort([('score', {'$meta': 'textScore'})])
            output = json.jsonify(list(output))
            db.drop_collection('forbidden')
            return output
        else:    
            output = db.forbidden.find({ '$text': {'$search': ' '.join(busqueda)}},
            { 'score': { "$meta": 'textScore'}, '_id': 0, 'dummy': 0}).sort([('score', {'$meta': 'textScore'})])
            output = json.jsonify(list(output))
            db.drop_collection('forbidden')
            return output
    
    if userId and not desired and not required and not forbidden:
        output = db.messages.find({'sender': userId}, {'_id': 0})
        return json.jsonify(list(output))
    elif userId:
        output = db.messages.find(
        { '$text': {'$search': ' '.join(busqueda)}, 'sender': userId},
        { 'score': { "$meta": 'textScore'}, '_id': 0}).sort([('score', {'$meta': 'textScore'})])
        return json.jsonify(list(output))
    else:
        output = db.messages.find(
        { '$text': {'$search': ' '.join(busqueda)}},
        { 'score': { "$meta": 'textScore'}, '_id': 0}).sort([('score', {'$meta': 'textScore'})])
        return json.jsonify(list(output))


if __name__ == '__main__':
    app.run()