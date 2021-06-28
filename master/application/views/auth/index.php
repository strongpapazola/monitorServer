<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="main-panel" data="blue">
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center"><strong>BisaAI Control Server</strong></h4>
                        <form action="" method="POST">
                        <?php if ( $this->session->flashdata('msg') ) : ?>
                            <?= $this->session->flashdata('msg'); ?>
                        <?php endif; ?>
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                            <?= form_error('username','<small class="form-text text-danger">','</small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <?= form_error('password','<small class="form-text text-danger">','</small>'); ?>
                          </div>
                          <!-- <div class="form-group">
                              <div class="g-recaptcha" data-theme="dark" data-sitekey="6Le5xKwZAAAAAE2BO_zcfDRdZLRXVP4hjZOMua3k"></div>
                              <?php if ( $this->session->flashdata('captchaerror') ): ?>
                                  <?= $this->session->flashdata('captchaerror'); ?>
                              <?php endif ?>
                          </div> -->
                          <button type="submit" class="btn btn-info">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
