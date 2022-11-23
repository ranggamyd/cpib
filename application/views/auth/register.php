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
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftarkan Akun !</h1>
                                    </div>
                                    <form action="<?= base_url('auth/register_account') ?>" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control form-control-user <?= form_error('name') ? 'is-invalid' : '' ?>" id="nama" placeholder="Nama Mini Plant" required>
                                            <div id="name" class="invalid-feedback">
                                                <?= form_error('name') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="phone" value="<?= set_value('phone') ?>" class="form-control form-control-user <?= form_error('phone') ? 'is-invalid' : '' ?>" id="phone" placeholder="No. Telepon" required>
                                                <div id="phone" class="invalid-feedback">
                                                    <?= form_error('phone') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" placeholder="Alamat Email">
                                                <div id="email" class="invalid-feedback">
                                                    <?= form_error('email') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" name="password1" value="<?= set_value('password1') ?>" class="form-control form-control-user <?= form_error('password1') ? 'is-invalid' : '' ?>" id="password1" placeholder="Password" required>
                                                <div id="password1" class="invalid-feedback">
                                                    <?= form_error('password1') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="password2" value="<?= set_value('password2') ?>" class="form-control form-control-user <?= form_error('password2') ? 'is-invalid' : '' ?>" id="password2" placeholder="Konfirmasi password" required>
                                                <div id="password2" class="invalid-feedback">
                                                    <?= form_error('password2') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                                        <hr>
                                    </form>
                                    <a class="small float-right" href="<?= base_url('auth/') ?>">Sudah terdaftar?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>