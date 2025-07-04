<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h3 class="text-center">Login</h3>
        </div>
    </div>
    <?php

    if (session()->getFlashdata('login_failed')) : ?>
        <div class="row">
            <div class="alert alert-danger col-lg-4 mx-auto" role="alert">
                <? session()->getFlashdata('login_failed'); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-4 mx-auto">
            <form action="<?= base_url('login/proses-login') ?>" method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control <?php if ($validation->hasError('email')) echo 'is-Invalid' ?>" type="email" name="email" id="email"
                        value="<?= old('email') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control <?php if ($validation->hasError('email')) echo 'is-Invalid' ?>" type="password" name="password" id="password"
                        value="<?= old('email') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password') ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>