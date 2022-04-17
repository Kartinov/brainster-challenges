<?php

require_once __DIR__ . '/../classes/VehicleModel.php';
require_once __DIR__ . '/../classes/VehicleType.php';
require_once __DIR__ . '/../classes/FuelType.php';
require_once __DIR__ . '/../classes/Registration.php';
require_once __DIR__ . '/../classes/Session.php';

// Component
require_once __DIR__ . '/components/header.php';

?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="mb-4 text-center">
                <h1>Vehicle <?= Session::has('process:update-registration') ? 'Edit' : '' ?> Registration</h1>
            </div>
            <?php Session::printAlertMessage() ?>
            <form action="<?= Session::has('process:update-registration') ? App::route('registration.update') : App::route('registration.store') ?>" method="POST">

                <div class="row mb-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="vehicle_model_id">Vehicle Model</label>
                            <select name="vehicle_model_id" id="vehicle_model_id" class="form-control outline-none">
                                <option value="">Default select</option>

                                <?php foreach ((new VehicleModel)->all() as $vehicle_model) : ?>
                                    <option value="<?= $vehicle_model->id ?>" <?= Session::registration('vehicle_model_id') == $vehicle_model->id ? 'selected' : '' ?>>
                                        <?= $vehicle_model->name ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_chassis_number">Vehicle chassis
                                number</label>
                            <input type="text" name="vehicle_chassis_number" id="vehicle_chassis_number" class="form-control" value="<?= Session::registration('vehicle_chassis_number') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="registration_number">Vehicle
                                registration number</label>
                            <input type="text" name="registration_number" id="registration_number" class="form-control" value="<?= Session::registration('registration_number') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="registration_expired_at">Registration
                                to</label>
                            <input type="date" name="registration_expired_at" id="registration_expired_at" class="form-control" value="<?= Session::registration('registration_expired_at') ?>" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="vehicle_type_id">Vehicle Type</label>
                            <select name="vehicle_type_id" id="vehicle_type_id" class="form-control outline-none">
                                <option value="">Default select</option>

                                <?php foreach ((new VehicleType)->all() as $vehicle_type) : ?>
                                    <option value="<?= $vehicle_type->id ?>" <?= Session::registration('vehicle_type_id') == $vehicle_type->id ? 'selected' : '' ?>>
                                        <?= $vehicle_type->name ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_production_year">Vehicle
                                production year</label>
                            <input type="date" name="vehicle_production_year" id="vehicle_production_year" class="form-control" value="<?= Session::registration('vehicle_production_year') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fuel_type_id">Fuel Type</label>
                            <select name="fuel_type_id" id="fuel_type_id" class="form-control outline-none">
                                <option value="">Default select</option>

                                <?php foreach ((new FuelType)->all() as $fuel_type) : ?>
                                    <option value="<?= $fuel_type->id ?>" <?= Session::registration('fuel_type_id') == $fuel_type->id ? 'selected' : '' ?>>
                                        <?= $fuel_type->name ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="form-group mt-5">

                            <!-- Form Buttons -->
                            <?php if (Session::has('process:update-registration')) : ?>

                                <div class="row">
                                    <div class="col">
                                        <a href="<?= App::route('cancel.edit') ?>" class="btn btn-danger outline-none btn-block">Cancel</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success outline-none btn-block">Update</button>
                                    </div>
                                </div>

                            <?php else : ?>

                                <button type="submit" class="btn btn-primary outline-none btn-block">Submit</button>

                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <?php

                if (Session::has('process:old-values')) {
                    Session::remove('registration');
                    Session::remove('process:old-values');
                }

                ?>

            </form>
        </div>
    </div>

    <div class="row border bg-light rounded-lg">
        <div class="col-12 mb-3 p-3">
            <form action="<?= App::route('admin_panel') ?>" method="GET" class="text-right">
                <input type="text" name="q" id="" class="form-control w-25 d-inline" value="<?= $_GET['q'] ?? '' ?>" placeholder="Search...">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Chassis number</th>
                            <th>Production year</th>
                            <th>Registration number</th>
                            <th>Fuel type</th>
                            <th>Registration to</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $registrations = (new Registration)
                            ->selectRaw('registrations.*, fuel_types.name as ft_name, vehicle_models.name as vm_name, vehicle_types.name as vt_name')
                            ->join('fuel_types', 'registrations.fuel_type_id', '=', 'fuel_types.id')
                            ->join('vehicle_models', 'registrations.vehicle_model_id', '=', 'vehicle_models.id')
                            ->join('vehicle_types', 'registrations.vehicle_type_id', '=', 'vehicle_types.id');

                        if (isset($_GET['q'])) {

                            $registrations
                                ->orWhere(['vehicle_chassis_number', 'LIKE', "%{$_GET['q']}%"])
                                ->orWhere(['registration_number', 'LIKE', "%{$_GET['q']}%"])
                                ->orWhere(['vehicle_types.name', 'LIKE', "%{$_GET['q']}%"])
                                ->orWhere(['fuel_types.name', 'LIKE', "%{$_GET['q']}%"])
                                ->orWhere(['vehicle_models.name', 'LIKE', "%{$_GET['q']}%"]);
                        }

                        ?>

                        <?php foreach ($registrations->get() as $registration) : ?>

                            <tr class="<?= $registrations->registrationExpirationColor($registration) ?>">
                                <td><?= $registration->id ?></td>
                                <td><?= $registration->vm_name ?></td>
                                <td><?= $registration->vt_name ?></td>
                                <td><?= $registration->vehicle_chassis_number ?>
                                </td>
                                <td><?= date('Y', strtotime($registration->vehicle_production_year)) ?>
                                </td>
                                <td><?= $registration->registration_number ?></td>
                                <td><?= $registration->ft_name ?></td>
                                <td><?= $registration->registration_expired_at ?>
                                </td>
                                <td class="d-flex">
                                    <a href="<?= App::route('registration.delete', $registration->id) ?>" class="btn btn-sm btn-danger mr-2">Delete</a>
                                    <a href="<?= App::route('registration.edit', $registration->id) ?>" class="btn btn-sm btn-warning mr-2">Edit</a>

                                    <?php if ($registrations->isExtendable($registration)) : ?>
                                        <a href="<?= App::route('registration.extend', $registration->id) ?>" class="btn btn-sm btn-success">Extend</a>
                                    <?php endif ?>

                                </td>
                            </tr>

                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php require_once __DIR__ . '/components/footer.php' ?>