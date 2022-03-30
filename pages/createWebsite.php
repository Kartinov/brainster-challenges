<?php require_once __DIR__ . "/../partials/header.php" ?>

<div class="container-fluid bg-image min-vh-100 pt-3 pb-5" style="background-image: url(<?= asset('img/bg-abstract-gray.jpg') ?>)">

    <h1 class="text-center">You are one step away from your webpage</h1>

    <form method="POST" action="<?= route('storeWebsite') ?>" class="row justify-content-between">

        <!-- First form column -->
        <div class="col-4 p-3">
            <div class="p-3 mb-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="">Cover Image URL</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Main Title of Page</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Subtitle of Page</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Something about you</label>
                    <textarea class="form-control" id="" name="" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Your telephone number</label>
                    <input type="tel" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
            </div>

            <!-- Select -->
            <div class="p-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="">Do you provide services or products?</label>
                    <select class="form-control" id="" name="">
                        <option value="" selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Second form column -->
        <div class="col-4 p-3">
            <div class="p-3 bg-white shadow rounded">
                <p class="lead">Provide url for an image and description of your service/product</p>
                <div class="form-group">
                    <label for="">Image URL</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Description of service/product</label>
                    <textarea class="form-control" id="" name="" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Image URL</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Description of service/product</label>
                    <textarea class="form-control" id="" name="" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Image URL</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Description of service/product</label>
                    <textarea class="form-control" id="" name="" rows="2"></textarea>
                </div>
            </div>
        </div>

        <!-- Third form column -->
        <div class="col-4 p-3">
            <div class="p-3 mb-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="" class="lead">Provide a description of your company, something people should be aware of before they contact you:</label>
                    <textarea class="form-control" id="" name="" rows="2"></textarea>
                </div>
            </div>

            <!-- Social links -->
            <div class="p-3 bg-white shadow rounded">
                <div class="form-group">
                    <label for="">Linkedin</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Facebook</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Twitter</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
                <div class="form-group">
                    <label for="">Instagram</label>
                    <input type="text" class="form-control" id="" name="">
                </div>
            </div>
        </div>
        <div class="col-6 offset-3 mt-4">
            <button type="submit" class="btn btn-lg btn-secondary btn-block">Submit</button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . "/../partials/footer.php" ?>