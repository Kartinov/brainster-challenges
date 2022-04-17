    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content <?= Session::has('message') ? 'animate__animated animate__shakeX' : '' ?>">
                <div class="modal-header border-bottom-0 bg-primary">
                    <h4 class="mb-0 align-self-center text-light">Admin login</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php if (Session::has('login-message')) : ?>
                        <div class="alert alert-danger small">
                            <?= Session::get('login-message') ?>
                        </div>
                    <?php endif ?>

                    <div class="form-title text-center">
                        <form method="POST" action="<?= App::route('login') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control outline-none" id="username" name="username" placeholder="Enter your username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control outline-none" id="password" name="password" placeholder="Enter your password" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block outline-none">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>