<?php

require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Registration.php';
require_once __DIR__ . '/../classes/Session.php';

$id = $_GET['id'];

$registration = new Registration;
$oldRegistration = $registration->where(['id' => $id])->first();

$expirationDate = $oldRegistration->registration_expired_at;
$extendedDate   = strtotime($expirationDate . '+ 1 year');
$extendedDate   = date('Y-m-d', $extendedDate);

$data = [
    'id' => $id,
    'registration_expired_at' => $extendedDate
];

if ($registration->update($data)) {
    Session::set('message', [
        'status' => 1,
        'text'   => "Registration number: {$oldRegistration->registration_number} is extended to: {$extendedDate}"
    ]);
} else {
    Session::set('message', [
        'status' => 0,
        'text'   => "An error occured"
    ]);
}

App::redirectTo(App::route('admin_panel'));
