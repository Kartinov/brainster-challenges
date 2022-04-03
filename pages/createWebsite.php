<?php

session_start();

require_once __DIR__ . "/../partials/header.php" ?>

<div class="container-fluid bg-image min-vh-100 pt-3 pb-5" style="background-image: url(<?= asset('img/bg-content.jpg') ?>)">

    <h1 class="text-center display-4">You are one step away from your webpage</h1>

    <?php printErrorMessages() ?>

    <a href="<?= route('demoFields') ?>" class="btn btn-info">Fill in the fields with demo inputs</a>

    <form method="POST" action="<?= route('storeWebsite') ?>" class="row justify-content-between">

        <!-- First form column -->
        <div class="col-md-4 p-3">
            <div class="p-3 mb-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="<?= old('company_name') ?>">
                </div>
            </div>
            <div class="p-3 mb-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="cover_image">Cover Image URL</label>
                    <input type="text" class="form-control" id="cover_image" name="cover_image" value="<?= old('cover_image') ?>">
                </div>
                <div class=" form-group">
                    <label for="main_title">Main Title of Page</label>
                    <input type="text" class="form-control" id="main_title" name="main_title" value="<?= old('main_title') ?>">
                </div>
                <div class=" form-group">
                    <label for="main_subtitle">Subtitle of Page</label>
                    <input type="text" class="form-control" id="main_subtitle" name="main_subtitle" value="<?= old('main_subtitle') ?>">
                </div>
                <div class=" form-group">
                    <label for="main_description">Something about you</label>
                    <textarea class="form-control" id="main_description" name="main_description" rows="2"><?= old('main_description') ?></textarea>
                </div>
                <div class=" form-group">
                    <label for="phone">Your telephone number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>">
                </div>

                <!-- Location -->
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?= old('country') ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= old('city') ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="address">Street Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= old('address') ?>">
                    </div>
                </div>
            </div>

            <!-- Select -->
            <div class="p-3 bg-white shadow rounded">
                <?php require_once __DIR__ . '/components/providingTypesSelect.php' ?>
            </div>
        </div>

        <!-- Second form column -->
        <div class="col-md-4 p-3">
            <?php require_once __DIR__ . '/components/cardInputs.php' ?>
        </div>

        <!-- Third form column -->
        <div class="col-md-4 p-3">
            <div class="p-3 mb-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="contact_description" class="lead">Provide a description of your company, something people should be aware of before they contact you:</label>
                    <textarea class="form-control" id="contact_description" name="contact_description" rows="2"><?= old('contact_description') ?></textarea>
                </div>
            </div>

            <!-- Social links -->
            <div class="p-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= old('linkedin') ?>">
                </div>
                <div class=" form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?= old('facebook') ?>">
                </div>
                <div class=" form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="<?= old('twitter') ?>">
                </div>
                <div class=" form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?= old('instagram') ?>">
                </div>
            </div>
        </div>

        <div class=" col-6 offset-3 mt-4">
            <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
        </div>
    </form>
</div>


<?php

unset($_SESSION['old']);
require_once __DIR__ . "/../partials/footer.php" ?>