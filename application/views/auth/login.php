<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="<?= base_url('assets/img/logo_bkipm2.png') ?>" alt="BKIPM Logo">
                        </div>
                        <div class="col-lg-6 d-flex align-items-center w-100">
                            <div class="p-5 flex-grow-1">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-0">Selamat datang!</h1>
                                    <h1 class="h6 text-gray-900 mb-4">Sertifikasi CPIB BKIPM</h1>
                                </div>
                                <form action="<?= base_url('auth/login') ?>" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" name="credential" value="<?= set_value('credential') ?>" class="form-control form-control-user <?= form_error('credential') ? 'is-invalid' : '' ?>" id="credential" placeholder="Masukkan Username / Email / No. HP">
                                        <div id="credential" class="invalid-feedback">
                                            <?= form_error('credential') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" placeholder="Masukkan Password">
                                        <div id="password" class="invalid-feedback">
                                            <?= form_error('password') ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
                                    <hr>
                                </form>
                                <a class="small" href="#">Lupa Password?</a>
                                <a class="small float-right" href="<?= base_url('auth/register') ?>">Belum punya akun?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>