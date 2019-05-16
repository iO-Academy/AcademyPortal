<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// db connection
$container['dbConnection'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $db = new PDO($settings['host'].$settings['dbName'], $settings['userName']);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    return $db;
};

$container['RegisterController'] = new \Portal\Factories\RegisterControllerFactory();

$container['UserModel'] = new \Portal\Factories\UserModelFactory();

$container['LoginController'] = new \Portal\Factories\LoginControllerFactory();

$container['addApplicantController'] = new \Portal\Factories\AddApplicantControllerFactory();

$container['ApplicantModel'] = new \Portal\Factories\ApplicantModelFactory();

$container['SaveApplicantController'] = new \Portal\Factories\SaveApplicantControllerFactory();

$container['ApplicationFormModel'] =  new \Portal\Factories\ApplicationFormModelFactory();

$container['ApplicationFormController'] = new \Portal\Factories\ApplicationFormControllerFactory();

$container['DisplayApplicantsController'] = new \Portal\Factories\DisplayApplicantsControllerFactory();

$container['AdminController'] = new \Portal\Factories\AdminControllerFactory();

$container['RegisterUserController'] = new \Portal\Factories\RegisterUserControllerFactory();

$container['HomePageController'] = new \Portal\Factories\HomePageControllerFactory();

$container['GetApplicantController'] = new \Portal\Factories\GetApplicantControllerFactory();

$container['RandomPasswordModel'] = new \Portal\Models\RandomPasswordModel();

$container['CohortModelFactory'] = new \Portal\Factories\CohortModelFactory();

$container['DisplayHiringPartnerPageController'] = new \Portal\Factories\DisplayHiringPartnerPageControllerFactory();

$container['CreateHiringPartnerController'] = new \Portal\Factories\CreateHiringPartnerControllerFactory();

$container['HiringPartnerModel'] = new \Portal\Factories\HiringPartnerModelFactory();

