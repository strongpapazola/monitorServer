<div class="main-panel" data="blue">
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center"><strong>Register</strong></h4>
                        <form action="" method="POST">
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                            <?= form_error('username','<small class="form-text text-danger">','</small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password1" class="form-control" id="password" placeholder="Password">
                            <?= form_error('password1','<small class="form-text text-danger">','</small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="password">Verify Password</label>
                            <input type="password" name="password2" class="form-control" id="password" placeholder="Verify Password">
                            <?= form_error('password2','<small class="form-text text-danger">','</small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="role_id">Role</label>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role_id" value="1">Admin
                                  </label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role_id" value="2" checked>Viewer
                                  </label>
                                </div>
                          </div>
                          <button type="submit" class="btn btn-info">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>