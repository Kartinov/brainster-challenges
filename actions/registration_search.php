<?php

require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Registration.php';
require_once __DIR__ . '/../classes/Session.php';

App::onlyPostAllowed();

if (isset($_POST['registration_search'])) {
    $searchInput = strtoupper(htmlspecialchars($_POST['registration_search']));
}

if (empty($searchInput)) {
    Session::set('message', [
        'status' => 0,
        'text'   => 'Field is required'
    ]);

    App::redirectTo(App::route('home'));
}

$registration = new Registration;

// Checks if registration exists
if (!$registration->where(['registration_number' => $searchInput])->exists()) {
    Session::set('message', [
        'status' => 0,
        'text'   => 'Тhis license plate is not registered in this association'
    ]);

    App::redirectTo(App::route('home'));
}

$registration->clearWhere(); // clear previous 'where' property

$registration = $registration->selectRaw('registrations.*, fuel_types.name as ft_name, vehicle_models.name as vm_name, vehicle_types.name as vt_name')
    ->join('fuel_types', 'registrations.fuel_type_id', '=', 'fuel_types.id')
    ->join('vehicle_models', 'registrations.vehicle_model_id', '=', 'vehicle_models.id')
    ->join('vehicle_types', 'registrations.vehicle_type_id', '=', 'vehicle_types.id')
    ->orWhere(['registration_number', '=', $searchInput])
    ->get();

Session::set('searchedRegistration', $registration);

App::redirectTo(App::route('home'));
