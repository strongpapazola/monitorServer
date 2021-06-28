<!-- End Navbar -->
<div class="content">
    <div class="row">
          <?php if ( $hasilip ) { ?>
            <div class="card">
              <div class="card-header">
                <h4>Result</h4>
              </div>
              <div class="card-body">
                  <table class="table">
                <?php foreach ($hasilip as $key => $value) { ?>
                  <?php if ( $key == 'loc' ) { ?>
                      <tr>
                        <th scope="col"><?= $key; ?></th>
                        <td><a href="https://www.google.com/maps/search/<?= $value; ?>" target="_blank"><?= $value; ?></a></td>
                      </tr>
                  <?php } else { ?>
                      <tr>
                        <th scope="col"><?= $key; ?></th>
                        <td><?= $value; ?></td>
                      </tr>
                  <?php } ?>
                <?php } ?>
            </table>
              </div>
            </div>
          <?php } ?>
        <div class="card">
          <div class="card-header">
            IP Tracker
          </div>
          <div class="card-body">
            <h5 class="card-title">For Tracking IP Address</h5>
            <form action="" method="POST">
              <div class="form-group">
                <label>IP Address</label>
                <input type="text" class="form-control" name="ipaddr" placeholder="Enter IP Address" value="<?= set_value('ipaddr'); ?>">
                <?= form_error('ipaddr','<small id="emailHelp" class="form-text text-danger">','</small>'); ?>
              </div>
              <button type="submit" class="btn btn-info">Submit</button>
            </form>
          </div>
        </div>

        <!-- Modal -->
          <div class="modal fade" id="trackip" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="trackip">Track IP</h3>
                  <button data="blue" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


    </div>
</div>