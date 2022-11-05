<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="<?= base_url('assets/img/logo_bkipm2.png') ?>" alt="BKIPM Logo">
                        </div>
                        <div class="col-lg-7 d-flex align-items-center w-100">
                            <div class="p-5 flex-grow-1">
                                <div class="text-center">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru</h1>
                                    </div>
                                    <form action="<?= base_url('auth/register_account') ?>" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Username">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="phone" class="form-control form-control-user" id="phone" placeholder="No. Telepon">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Alamat Email">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Ulangi password">
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