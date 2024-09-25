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

This allows you to automatically send email notifications from a gmail account to admin(s) whenever applicants amend
their profiles.

**Before proceeding, ensure that you have enabled 2-step verification for your gmail account.**

1. __[Generate an app password in gmail](https://myaccount.google.com/apppasswords)__
    - Under "Select app", choose `Mail`
    - Under "Select device", choose `Mac`

After clicking "Generate", you should see the following:

![password](https://res.cloudinary.com/dgfofxbf1/image/upload/c_scale,w_526/v1685630498/academyportal/password_uo3qck.png)

2. Change the following lines of code in `app/settings.php`:

``` php
'adminEmail' => [
     'hostUsername' => 'sender@gmail.com',
     'hostPassword' => 'app-password',
     'adminEmail' => 'recipient@gmail.com'
],
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

**/editApplicant**

POST

- Updates an applicant record in the applicant table
- Sends:
  ```
  {
  "id":"14",
  "cohort":["1","3","6","7"],
  "stageId":"1",
  "stageOptionId":null,
  "name":"Ignazio Hairesnape",
  "email":"ihairesnape3@themeforest.net",
  "phoneNumber":"07121444941",
  "gender":"2",
  "backgroundInfoId":"1",
  "whyDev":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia
  arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at
  porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus
  sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a
  orci.","codeExperience":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec
  in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat
  risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum.
  Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non,
  viverra a orci.",
  "hearAboutId":"1",
  "eligible":true,
  "eighteenPlus":true,
  "finance":true,
  "apprentice":false,
  "dateTimeAdded":"2021-11-25T16:36",
  "notes":"Cheddar",
  "taster":"",
  "tasterAttendance":false,
  "assessmentDay":"",
  "customAssessmentDay":"",
  "assessmentTime":"",
  "aptitude":"",
  "attitude":"",
  "averageScore":"",
  "diversitechInterest":false,
  "chosenCourseId":"",
  "assessmentNotes":"",
  "fee":"0",
  "diversitech":"0",
  "edaid":"0",
  "upfront":"0",
  "laptop":false,
  "laptopDeposit":false,
  "signedTerms":false,
  "contactFormSigned":false,
  "signedDiversitech":false,
  "laptopNum":"",
  "kitCollectionDay":"",
  "kitCollectionTime":"",
  "kitNum":"",
  "inductionEmailSent":false,
  "signedNDA":false,
  "checkedID":false,
  "":"",
  "dataProtectionName":false,
  "dataProtectionPhoto":false,
  "dataProtectionTestimonial":false,
  "dataProtectionBio":false,
  "dataProtectionVideo":false,
  "githubUsername":"",
  "portfolioUrl":"",
  "pleskHostingUrl":"",
  "githubEducationLink":"",
  "additionalNotes":""
  }
  ```
- Returns success true / false:
    - if update is successful:
        - `{$data['success'] = true; $data['msg'] = 'Applicant has been updated!'; $statusCode = 200;}`
    - if update is unsuccessful:
        - `{$data['success'] = false; $data['msg'] = 'Invalid applicant data'; $statusCode = 400;}`

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
    - If email exists in the database, and the applicant already has an aptitude score then it adds the aptitude score
      to the assessmentNotes with a time stamp.
        - `{"success": true, "message": "Updated the applicants assessment notes", "data": []}`
    - If email does not exist in the database
        - `{"success": false, "message": "Aptitude score not added - email not found", "data": []}`
    - If invalid data supplied
        - `{"success": false, "message": "Aptitude score not added - invalid data provided.", "data": []}`

**/addCourse**

POST

- Adds a new course to the courses table in the database.
- Sends:
    - `{"courseName":"example","startDate":"2023-04-12","endDate":"2024-04-12","trainer":"['1']","notes":"example","in_person":"0","remote":"1"}`
    - If `remote` or `in_person` is `1` (true) then sends data regarding number of available spaces on the course
        - `{"remote_spaces":"5","in_person_spaces":"2"}`
- Returns success true / false:
    - if course is added successfully
        - `{"success": true, "message": "New Course successfully saved."}`
    - if course could not be added
        - `{"success": false, "msg": "Unexpected error."}`

**/updateTeams**

POST

- When the user is logged in and selects 'save teams' the new team is inserting into database.
- If successful the following is returned:

```
  {success: true, message: "Teams successfully saved.", data: {team1: "11", team2: "12"}}
```

- If trainer name is missing it returns the following

```
{success: false, message: "Missing trainer names", data: []}
```

**/getCourses**

GET

- Gets all scheduled courses
- Returns success true / false
    - If the course can't be retrieved
        - `{"success": false, "message": "Something went wrong."}`
    - If there are no courses scheduled but the data is retrieved successfully
        - `{"success": true, "message": "No courses scheduled"}`
    - If the data is retrieved successfully it will return an array with the courses scheduled

**/getEvents**

GET

- Gets all the future events present in database.
- Required:
- Optional: 
    - `?categoryValue=[integer]`
    - `?searchTerm=[alphanumeric]`
    - `?past=[tinyInt]`  --- if 1, returns past events
- Data format:
    - `{"id": 129,
      "name": "Hiring Event",
      "category": 6,
      "category_name": "Other",
      "location": "San Andres",
      "date": "2024-09-28",
      "start_time": "16:11:07",
      "end_time": "22:38:52",
      "notes": "support"
      }`
- Returns success true / false:
    - if the data is received successfully
        - `{’success’:true, ‘message: ‘’, ‘data’:[]}`

    - if the data is not received successfully
        - `{'success': false,'message': 'Something went wrong.','data': []}`

    - if there is no associated data in the database
        - `{'success': false,'message': 'No results returned matching your search','data': []}`

    - if search term is over 255 characters
        - `{'success': false,'message': 'Search term cannot be greater than 255 characters.','data': []}`

**/addTrainer**

POST

- Adds new trainer to the database
- Sends an array of:
  `{'name': 'string', 'email': 'string', 'notes': 'string'}`
    - Returns success true / false:
      - If trainer is added successfully
      `{'success': true, 'msg': 'New Trainer successfully saved.', 'data': []}`
      - If trainer can't be added
      `{'success': false, 'msg': 'Unexpected error.', 'notes': []}`

**/addCategory**

POST

- Adds new course category to the course_categories table in the database
- Sends an array of:
  `{courseCategory: "Example Category"}`
- Returns success true / false:
    - If category was added successfully:
        - `{'success' => true, 'message' => 'New Category successfully saved.','data' => []}`
    - If category was not added successfully due to an exception:
        - `{'success' => false,'message' => 'Unexpected Error.','data' => []}`
    - If category was not added successfully due to a server error:
        - `{'success' => false,'message' => 'Interal error: {error message}','data' => []}`

**/deleteCategory**

POST

- Deletes a course category from the course_categories table in the database
- Sends an array of:
  `{id: 9}`
- Returns success true / false:
    - If category was deleted successfully:
        - `{'success' => true,'message' => 'Category deleted','id' => [9]}`
    - If category was not deleted successfully:
        - `{'success' => false,'message' => 'Unexpected error occurred'}`

**/getGender**

GET

- Retrieves all the gender information from the gender table on the academy portal database. 
- Data Format: 
  - `{"id":1,"gender":"Male"}`
- If the data is successfully retrieved:
  - `{"success" => true, "message"=> "Retrieved dropdown info.", "data"=> []}`

    
**/Routes that will need to be documented in the future**  

/api/getApplicant/{id}  
/api/editApplicant  
/api/updateStudentProfile  
/api/getAssessmentApplicants  
/api/addEvent  
/api/addContact  
/api/addHiringPartnerToEvent  
/api/deleteHiringPartnerFromEvent  
/api/getStages
/api/editStageOption  
/api/deleteStageOption  
/api/addStageOption  
/api/deleteAllStageOptions  
/api/getNextStageOptions/{stageid}  
/api/progressApplicantStage
/api/csvUpload  
/api/getEventCategories  
/api/deleteTrainer  
/api/sendEmail  
/api/lockApplicantField  
/api/getAptitudeScore  
/api/getCalendarEvents  



