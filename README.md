# AcademyPortal API

Live Version at: https://portal.dev.io-academy.uk/

### Login Details

- Email: test@test.com
- Password: nickloveslemons

### Setup

1. Run `composer install` in root of project
2. Run `npm install` in root of project
3. Create database with name `academyPortal` and populate using latest version in db/
4. To run the application locally: `composer start`

### Compiling SCSS

- Must have SASS installed for this to work (`npm install` should have done this)
- Run `./node_modules/sass/sass.js --watch public/scss/styles.scss public/css/style.css` in the root of the project

### Running tests

- To run the unit tests locally: `composer test`

### Running the code sniffer

- In order to manually run the code sniffer: `composer sniff`

### Deploy

- Files/folders that can be easily replaced with uploads:
    - db/
    - logs/
    - public/
    - src/Classes/
- Files that require more care:
    - src/dependencies (Factories go here but so does db connection, config for db should be the same in local and
      deployed now (config, not credentials))
    - src/settings (deployed version contains different credentials, shouldn't need to be updated)

### Set Up Email Server

This allows you to automatically send email notifications from a gmail account to admin(s) whenever applicants amend their profiles.

**Before proceeding, ensure that you have enabled 2-step verification for your gmail account.**

1. __[Generate an app password in gmail](https://myaccount.google.com/apppasswords)__ 
    - Under "Select app", choose `Mail` 
    - Under "Select device", choose `Mac`

After clicking "Generate", you should see the following:

![password](https://res.cloudinary.com/dgfofxbf1/image/upload/c_scale,w_526/v1685630498/academyportal/password_uo3qck.png)

2. Change the following lines of code in `src/API/SendEmailController.php`: 
``` php
// Enter gmail address here
$mail->Username = 'testacademyportal@gmail.com';

// Enter app password here
$mail->Password = 'placeholder';

// Enter email address of recipients here 
$mail->addAddress('admin1@gmail.com', 'Admin1');
$mail->addAddress('admin2@yahoo.com', 'Admin2');
$mail->addAddress('admin3@gmail.com', 'Admin3');
// etc.
```

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
      'notes': 'example notes' }`
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
      'companyURL': 'www.example.com', }`
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
      'url_website': 'example.com' }`
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

- Changes the 'deleted' value for a single entry in the stages table to '1', and changes the 'order' value for that
  entry to '0'.
- Sends:
    - `{'id' : 'integer'}`
- Returns success true / false:
    - if stage is delete successfully
        - `{'success':true, 'msg':'Stage has been deleted successfuly.', 'data':[]}`
    - if stage could not be deleted
        - `{'success':false, 'msg':'Invalid id provided.', 'data':[]}`

**/aptitudeScore**

PUT 
- Checks if user email address exists in database. Adds test score to applicant entry in database.
- To add an applicant's test score to the database, the request should be sent as a PUT request to /api/aptitudeScore in
the following JSON format:
  - `{"email": 'example@email.com, "aptitude": integer}`
The score should be an integer 0-100.
- Returns success true/false:
  - If email exists in the database, adds applicant test store to the database.
    - `{"success": true, "message": "Updated the applicants aptitude score", "data": []}` 
  - If email exists in the database, and the applicant already has an aptitude score then it adds the aptitude score to the assessmentNotes with a time stamp.
    - `{"success": true, "message": "Updated the applicants assessment notes", "data": []}`
  - If email does not exist in the database
    - `{"success": false, "message": "Aptitude score not added - email not found", "data": []}`
  - If invalid data supplied
    - `{"success": false, "message": "Aptitude score not added - invalid data provided.", "data": []}`
  
