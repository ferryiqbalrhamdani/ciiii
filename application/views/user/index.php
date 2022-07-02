    <div class="row justify-content-center">

        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
            <h5 class="card-header"><?= $title; ?></h5>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-0 my-2 ml-2">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="card-text">Name</p>
                            </div>
                            :
                            <div class="col">
                                <p class="card-text"><?= $user['nama']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="card-text">Email</p>
                            </div>
                            :
                            <div class="col">
                                <p class="card-text"><?= $user['email']; ?></p>
                            </div>
                        </div>
                            </div>
                    </div>
                </div>
                <hr>
                <div class="row no-gutters">
                    <div class="col-md-4">

                    </div>
                    <div class="card-body p-0 my-2 ml-2">
                    <div class="col-md-3 offset-md-3">
                            <a href="<?= base_url('auth/logout'); ?>" class="card-link">Logout</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>