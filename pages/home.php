<?php

require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/../classes/Registration.php';

?>

<div class="container d-flex justify-content-center">
    <div class="search-wrapper bg-light mt-4 p-5">

        <!-- Form -->
        <form action="<?= App::route('registration.search') ?>" method="POST">
            <label for="registration_search" class="d-block text-center mb-3">
                <h1 class="display-4">Vehicle Registration</h1>
                <p class="lead">Enter your registration number to check its validity</p>
            </label>

            <div class="w-75 mx-auto">
                <?php Session::printAlertMessage() ?>
            </div>

            <div class="input-group shadow w-75 mx-auto">
                <input type="text" class="form-control p-4 outline-none" placeholder="Registration number" id="registration_search" name="registration_search" autocomplete="off">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary outline-none">Search</button>
                </div>
            </div>
        </form>

        <?php if (Session::has('searchedRegistration')) : ?>

            <?php $registration = (Session::getAndForget('searchedRegistration'))[0]; ?>

            <div class="col-12 mt-4">
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
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="<?= (new Registration)->registrationExpirationColor($registration) ?>">
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endif ?>
    </div>


    <!-- Login Modal -->
    <?php require_once __DIR__ . '/components/loginModal.php' ?>

    <script src="<?= App::asset('js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= App::asset('js/popper.min.js') ?>"></script>
    <script src="<?= App::asset('js/bootstrap.min.js') ?>"></script>

    <script>
        <?php if (Session::has('login-message')) : ?>
            $('#loginModal').modal('show')
        <?php Session::remove('login-message');
        endif ?>
    </script>

    <?php require_once __DIR__ . '/components/footer.php' ?>