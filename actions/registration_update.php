<?php

require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Registration.php';
require_once __DIR__ . '/../classes/Session.php';

$data = [
    'vehicle_model_id'          => $_POST['vehicle_model_id'],
    'vehicle_type_id'           => $_POST['vehicle_type_id'],
    'vehicle_chassis_number'    => $_POST['vehicle_chassis_number'],
    'vehicle_production_year'   => $_POST['vehicle_production_year'],
    'registration_number'       => $_POST['registration_number'],
    'fuel_type_id'              => $_POST['fuel_type_id'],
    'registration_expired_at'   => $_POST['registration_expired_at'],
];

$executed = (new Registration)
    ->where(['registration_number' => $_POST['registration_number']])
    ->update($data);

if ($executed) {
    Session::set('message', [
        'status' => 1,
        'text'   => 'Registration updated.'
    ]);

    Session::remove('registration');
    Session::remove('process:update-registration');
} else {
    Session::set('message', [
        'status' => 0,
        'text'   => 'An error occured, try again.'
    ]);
}



App::redirectTo(App::route('admin_panel'));
