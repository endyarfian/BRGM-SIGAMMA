<?= $this->extend('template/auth'); ?>
<?= $this->section('content'); ?>

<div class="auth-container d-flex h-100">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2><strong>PULIHKAN PASSWORD</strong></h2>
                                <p>Masukkan Email untuk memulihkan kembali identitas anda</p>

                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                </div>
                            </div>
                            <form action="<?= url_to('forgot') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="email"><?= lang('Auth.emailAddress') ?></label>
                                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">PULIHKAN</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>