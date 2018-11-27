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
$container['dbConnection'] = function () {
    $db = new PDO('mysql:host=192.168.20.20;dbname=academyPortal', 'root');
    return $db;
};

$container['UserModel'] = new \Portal\Factories\UserModelFactory();
$container['LoginController'] = new \Portal\Factories\LoginControllerFactory();
$container['AdminController'] = new \Portal\Factories\AdminControllerFactory();
$container['RegisterUserController'] = new \Portal\Factory\RegisterUserControllerFactory();
$container['addApplicantController'] = new \Portal\Factories\AddApplicantControllerFactory();
$container['ApplicantModel'] = new \Portal\Factories\ApplicantModelFactory();
$container['SaveApplicantController'] = new \Portal\Factories\SaveApplicantControllerFactory();
$container['ApplicationFormModel'] =  new \Portal\Factories\ApplicationFormModelFactory();
$container['ApplicationFormController'] = new \Portal\Factories\ApplicationFormControllerFactory();
$container['DisplayAplicantsController'] = new \Portal\Factories\DisplayApplicantsControllerFactory();