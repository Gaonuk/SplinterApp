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
  pass

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