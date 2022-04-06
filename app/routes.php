<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {
    //Frontend
    $app->get('/', 'HomePageController');
    $app->get('/admin', 'AdminPageController');
    $app->get('/register', 'RegisterPageController');
    $app->get('/addapplicant', 'addApplicantPageController');
    $app->get('/applicants', 'ApplicantsPageController');
    $app->get('/hiringPartners', 'HiringPartnerPageController');
    $app->get('/addHiringPartner', 'AddHiringPartnerPageController');
    $app->get('/addHiringPartnerContact', 'AddHiringPartnerContactPageController');
    $app->get('/events', 'EventsPageController');
    $app->get('/events-past', 'PastEventsPageController');
    $app->get('/addEvent', 'AddEventPageController');
    $app->get('/editStages', 'StagesPageController');
    $app->get('/editApplicant', 'EditApplicantPageController');
    $app->get('/teamPicker', 'TeamPickerPageController');
    $app->get('/student', 'TeamPickerPageController');
    $app->get('/public[/{id}]', 'StudentProfilePageController');
    $app->post('/public[/{id}]', 'StudentProfilePageController');
    $app->get('/courses', 'CoursesPageController');
    $app->get('/addCourse', 'AddCoursePageController');
    $app->get('/studentApplicationForm', 'StudentApplicationFormPageController');


    //API
    $app->get('/api/getStudents', 'GetStudentsController');
    $app->get('/api/getApplicant/{id}', 'GetApplicantController');
    $app->post('/api/saveApplicant', 'AddApplicantController');
    $app->delete('/api/deleteApplicant', 'DeleteApplicantController');
    $app->post('/api/editApplicant', 'EditApplicantController');
    $app->get('/api/applicationForm', 'GetApplicationFormController');
    $app->post('/api/createHiringPartner', 'AddHiringPartnerController');
    $app->get('/api/getHiringPartnerInfo', 'GetHiringPartnersController');
    $app->get('/api/getEvents', 'GetEventsController');
    $app->get('/api/getAssessmentApplicants', 'GetAssessmentApplicantsController');
    $app->post('/api/addEvent', 'AddEventController');
    $app->post('/api/addContact', 'AddContactController');
    $app->post('/api/addHiringPartnerToEvent', 'AddHiringPartnerToEventController');
    $app->get('/api/displayCompanyInfo/{id}', 'GetCompanyDetailsModalController');
    $app->post('/api/getHpsByEventId', 'GetHiringPartnersByIdController');
    $app->post('/api/deleteHiringPartnerFromEvent', 'DeleteHiringPartnerFromEventController');
    $app->post('/api/createStage', 'AddStageController');
    $app->delete('/api/deleteStage', 'DeleteStageController');
    $app->put('/api/updateStages', 'EditStageController');
    $app->get('/api/getStages', 'GetStagesController');
    $app->get('/api/getGender', 'GetGenderController');
    $app->post('/api/login', 'LoginController');
    $app->post('/api/registerUser', 'AddUserController');
    $app->put('/api/editStageOption', 'EditStageOptionController');
    $app->delete('/api/deleteStageOption', 'DeleteStageOptionController');
    $app->post('/api/addStageOption', 'AddStageOptionController');
    $app->delete('/api/deleteAllStageOptions', 'DeleteAllStageOptionsController');
    $app->post('/api/updateTeams', 'EditTeamsController');
    $app->get('/api/getNextStageOptions/{stageid}', 'GetNextStageOptionsController');
    $app->get('/api/progressApplicantStage', 'EditApplicantStageController');
    $app->get('/api/getCourses', 'GetCoursesController');
    $app->post('/api/addCourse', 'AddCourseController');

    // Remember to delete this AND deleteMe.phtml
    $container = $app->getContainer();

    $app->get('/testEmail', function ($request, $response, $args) use ($container) {


        $testData = ['fullName' => 'Gabriel', 'email' => 'test@test.com', 'phoneNumber' => '0', 'gender' => ':)', 'background' => 'background', 'why' => '12345', 'experience' => '12345',
            'startDate' => 'NOW', 'hearAboutUs' => 'Newspaper', 'studyConfirm' => True, 'ageConfirm' => True, 'TermsConfirm' => True];
        Portal\Utilities\Mailer::sendAllEmails($testData);

        $renderer = $container->get('renderer');
        return $renderer->render($response, "deleteMe.phtml", $args);
    });

};