<?php

require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Registration.php';
require_once __DIR__ . '/../classes/Session.php';

foreach ($_POST as $value) {
    if (empty($value)) {
        Session::set('message', [
            'status' => 0,
            'text'   => 'All fields are required'
        ]);

        Session::set('registration', $_POST);
        Session::set('process:old-values', '1');

        App::redirectTo(App::route('admin_panel'));
    }
}

$registration = new Registration;

$registrationNumberExists = $registration
    ->where(['registration_number' => $_POST['registration_number']])
    ->exists();

$chassisNumberExists = $registration
    ->clearWhere()
    ->where(['vehicle_chassis_number' => $_POST['vehicle_chassis_number']])
    ->exists();

if ($registrationNumberExists && $chassisNumberExists) {

    Session::set('message', [
        'status' => 0,
        'text'   => 'Registration or chassis number already exists.'
    ]);

    Session::set('registration', $_POST);
    Session::set('process:old-values', '1');

    App::redirectTo(App::route('admin_panel'));
}


$data = [
    'vehicle_model_id'          => $_POST['vehicle_model_id'],
    'vehicle_type_id'           => $_POST['vehicle_type_id'],
    'vehicle_chassis_number'    => $_POST['vehicle_chassis_number'],
    'vehicle_production_year'   => $_POST['vehicle_production_year'],
    'registration_number'       => $_POST['registration_number'],
    'fuel_type_id'              => $_POST['fuel_type_id'],
    'registration_expired_at'   => $_POST['registration_expired_at'],
];

if (!$registration->create($data)) {
    Session::set('message', [
        'status' => 0,
        'text'   => 'An error occured, try again.'
    ]);

    Session::set('registration', $_POST);
    Session::set('process:old-values', '1');
} else {
    Session::set('message', [
        'status' => 1,
        'text'   => 'Successfull registration.'
    ]);
}

App::redirectTo(App::route('admin_panel'));
