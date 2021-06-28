<div class="content">
  
    <div class="card">
      <div class="card-header">
        <h4 class="">Tambah Server</h4>
      </div>
      <div class="card-body">
         <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name Server</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name Server" value="<?= set_value('name'); ?>">
            <?= form_error('name','<small class="form-text text-danger">','</small>'); ?>
          </div>
          <div class="form-group">
            <label for="target">Target</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="target" value="1" checked>Public
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="target" value="2">Local
                  </label>
                </div>
          </div>
          <button type="submit" class="btn btn-info">Submit</button>
        </form>
      </div>
    </div>
</div>