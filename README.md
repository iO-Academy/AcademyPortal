# AcademyPortal API

### Routes
- for local development use localhost:8080/whatYouRequire as your URL

**/login**

POST
- Login registered user
- Sends 
	- `{'email':'example@email.com', 'password':'password'}`
- Returns success / fail
	- if registered user and correct email and password
		- `{'success':true, 'msg':'Valid User', 'data':[]}`  
	- if not registered or incorrect email and password
		- `{'success':false, 'msg':'Incorrect email or password.', 'data':[]}`

