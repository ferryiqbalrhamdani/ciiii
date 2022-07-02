<div class="row justify-content-center">

<div class="col-lg-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/changePassword'); ?>">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>"
                                    placeholder="Email Address">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="new_password1" name="new_password1" placeholder="Password">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="new_password2" name="new_password2" placeholder="Repeated Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>"><- Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


</div>