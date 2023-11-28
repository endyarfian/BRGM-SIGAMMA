<?= $this->extend('template/auth'); ?>
<?= $this->section('content'); ?>

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h2><strong>MASUK</strong></h2>
                                <p>Masukkan email/username serta password untuk mengakses SIGAMMA.</p>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= url_to('login') ?>" method="post">
                                </div>
                            </div>
                            <?= csrf_field() ?>
                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="login">Email</label>
                                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="login">Email / Username</label>
                                        <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                            Ingat Saya
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-secondary w-100">MASUK</button>
                                </div>
                            </div>
                            </form>
                            <?php if ($config->activeResetter) : ?>
                                <div class="col-12">
                                    <div class="text-center">
                                        <p><a class="mb-0" href="<?= url_to('forgot') ?>">Lupa password?</a></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>