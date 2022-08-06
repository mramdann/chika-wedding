<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                <?= $title ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?= $title ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <img alt="Chris Wood" src="<?= base_url() ?>assets/img/avatars/avatar.jpg" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                    <div class="mt-2">
                                        <input type="file" name="foto" id="foto" class="form-control">
                                    </div>
                                    <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput1" placeholder="name@example.com">
                                    <label for="floatingInput1">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput1" placeholder="name@example.com">
                                    <label for="floatingInput1">Email address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?= $title ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput1" placeholder="name@example.com">
                            <label for="floatingInput1">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput2" placeholder="name@example.com" value="name@example.com">
                            <label for="floatingInput2">Email address</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>