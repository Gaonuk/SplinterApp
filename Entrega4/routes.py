from flask import Flask, json, request
import pandas
import pymongo

uri = "mongodb://grupo15:grupo15@gray.ing.puc.cl/grupo15"
# La uri 'estándar' es "mongodb://user:password@ip/database"
client = pymongo.MongoClient(uri)
db = client.get_database()
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


if __name__ == '__main__':
    app.run()