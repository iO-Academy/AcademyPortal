# AcademyPortal API

### Routes
- for local development use localhost:8080/api/whatYouRequire as your URL

**/login**

POST
- Login registered user
- Sends:
	- `{'userEmail':'example@email.com', 'password':'password'}`
- Returns success true / false:
	- if registered user and correct email and password
		- `{'success':true, 'msg':'Valid User', 'data':[]}`  
	- if not registered or incorrect email and password
		- `{'success':false, 'msg':'Incorrect email or password.', 'data':[]}`


**/registerUser**

POST
- Registers a new user by saving in database
- Sends:
	- `{'email':'example@email.com', 'password':'password'}`
- Checks if email already exists in database
- If email does not exist then saves to database
- Returns success true / false:
	- if new user registered successfully
		- `{'success':true, 'msg':'User registered', 'data':[]}`
	- if new user not registered successfully, either already exists or insert into database failed
		- `{'success':false, 'msg':'User not registered.', 'data':[]}`
