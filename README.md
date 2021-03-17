# AcademyPortal API

### Setup

1. Run `composer install` in root of project
2. Create database with name `academyPortal` and populate using latest version in db/
3. To run the application locally: `composer start`

### Running tests

- To run the unit tests locally: `composer test`

### Deploy

- Files/folders that can be easily replaced with uploads:
    - db/
    - logs/
    - public/
    - src/Classes/
- Files that require more care:
    - src/dependencies (Factories go here but so does db connection, config for db should be the same in local and deployed now (config, not credentials))
    - src/settings (deployed version contains different credentials, shouldn't need to be updated)

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
	- `{'userEmail':'example@email.com', 'password':'password'}`
- Checks if email already exists in database
- If email does not exist then saves to database
- Returns success true / false:
	- if new user registered successfully
		- `{'success':true, 'msg':'User registered', 'data':[]}`
	- if new user not registered successfully, either already exists or insert into database failed
		- `{'success':false, 'msg':'User not registered.', 'data':[]}`


**/applicationForm**

GET
- Gets available dropdown values from database for:
	- When would you like to join us? 
	- How did you hear about iO Academy? 
- Returns:
	- if GET request is successful
		- `{'success':true, 'msg':'Retrieved dropdown info.', 'data':['cohorts':'Available cohort values', 'hearAbout':'Available hear about values']}`


**/saveApplicant**

POST
- Saves a new application to the applicant table in the database
- Sends:
	- `{'name': 'example',
   	    'email': 'example@example.com',
 	    'phoneNumber': '0123456789',
	    'cohortId': 2,
	    'whyDev': 'example interest in development',
	    'codeExperience': 'example coding experience',
	    'hearAboutId': 3,
	    'eligible': '1' or '0',
	    'eighteenPlus': '1' or '0',
	    'finance': '1' or '0',
	    'notes': 'example notes'
	   }`
- Returns success true / false:
	- if new applicant registered successfully
		- `{'success':true, 'msg':'Application Saved', 'data':[]}`
	- if new applicant not saved successfully
		- `{'success':false, 'msg':'Application Not Saved', 'data':[]}`
		
		
**/deleteApplicant**

DELETE
- Changes the 'deleted' value for a single entry in the applicant table to '1'.
- Sends: 
    - `{'id' : 'integer'}`
- Returns a json package with either an HTTP status of 200 for success or 500 for error.
    - `{'success':boolean, 'msg':'string', 'data':[]}`

**/createHiringPartner**

POST
- Saves a new hiring partner to the hiring_partner_companies table in the database
- Sends:
	- `{'name': 'example',
   	    'companySize': '1',
 	    'techStack': 'example tech stack',
	    'postcode': 'BA1 1AA,
	    'phoneNumber': '01225 444444',
	    'companyURL': 'www.example.com',
	   }`
- Returns success true / false:
	- if new applicant registered successfully
		- `{'success':true, 'msg':'Hiring Partner successfully added', 'data':[]}`
	- if new applicant not saved successfully
		- `{'success':false, 'msg':'Hiring Partner not added', 'data':[]}`
		

**/getHiringPartnerInfo**

GET
- Retrieves all the hiring partners data from the hiring_partner_companies table in the database
- Data format:
    - `{
        'id': '1',
        'name': 'example',
        'size': '5-30',
        'tech_stack': 'LAMP',
        'postcode': 'BA1 2QF',
        'phone_number': '07436124985',
        'url_website': 'example.com'
        }`
- Returns success true / false:
    - if the data are received successfully
        - `{'success':true, 'msg':'Query Successful', 'data':[]}`
    - if the data are not received successfully
        - `{'success':false, 'msg':'SQL error message', 'data':[]}`
    - if there are not data in the database
        - `{'success':false, 'msg':'No hiring partners found!', 'data':[]}`
        
**/createStage**

POST
- Adds a new stage in the last order position.
- Sends:
    - `{'title' : 'string'}` 
- Returns success true / false:
    - if stage is added successfully
        - `{'success':true, 'msg':'Stage added successfuly.', 'data':[]}`
    - if stage could not be added
        - `{'success':false, 'msg':'Error (dependant on reason)', 'data':[]}`
        
**/updateStages**

EDIT
- Goes through an array of edit requests and changes the database
- Sends an array of:
    - `{'id' : 'integer', 'title' : 'string', 'order' : 'integer'}` 
- Returns success true / false:
    - if stage is edited successfully
        - `{'success':true, 'msg':'Stage edit successful.'}`
    - if stage could not be edited
        - `{'success':false, 'msg':'Stage edit failed.'}`
        
**/deleteStage**
 
DELETE
- Changes the 'deleted' value for a single entry in the stages table to '1', and changes the 'order' value for 
that entry to '0'.
- Sends:
    - `{'id' : 'integer'}` 
- Returns success true / false:
    - if stage is delete successfully
        - `{'success':true, 'msg':'Stage has been deleted successfuly.', 'data':[]}`
    - if stage could not be deleted
        - `{'success':false, 'msg':'Invalid id provided.', 'data':[]}`
        
