extends Control

@onready var http_request: HTTPRequest = $HTTPRequest

var res: Dictionary

func _ready() -> void:
	http_request.request_completed.connect(_on_request_completed, 4)

	
	http_request.request("http://localhost:81/caio/eptran-backend/games/session/save_score.php")

func get_user() -> User:
	http_request.request("http://localhost:81/caio/eptran-backend/games/session/get_user.php")
	await http_request.request_completed
	
	if !res.has("user"): return null
	
	var user_dic: Dictionary = res.user
	var user := User.new()
	
	user.id = user_dic.id
	user.name = user_dic.name
	user.email = user_dic.email
	user.school_level = user_dic.school_level if user_dic.school_level else ""
	user.adm = user_dic.adm
	
	return user

func _on_request_completed(result: int, response_code: int, headers: PackedStringArray, body: PackedByteArray):
	var json = JSON.new()
	json.parse(body.get_string_from_utf8())
	var response = json.get_data()
	
	res = response
