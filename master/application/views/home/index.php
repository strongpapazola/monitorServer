<!-- End Navbar -->
<div class="content">
<!--  <meta http-equiv="refresh" content="60">-->
    <?php if ( $this->session->flashdata('data') ) {
      echo $this->session->flashdata('data');
    } ?>

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Public Server
          <a href="<?= base_url('home/tambahserver'); ?>" class="btn btn-info float-right">Tambah Server</a>
        </h4>
        <p class="card-text">For control public server on the web.</p>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col" class="text-center">Time</th>
          <th scope="col" class="text-center">IP Address</th>
          <th scope="col" class="text-center">Port</th>
          <th scope="col" class="text-center">SSH</th>
          <th scope="col" class="text-center">Service</th>
        </tr>
      </thead>
      <tbody>

    <?php $i = 1; ?>
    <?php foreach ($public as $pub) : ?>
        <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $pub['name']; ?></td>
          <td class="text-center">
            <?php if ( explode(':', explode(' ', $pub['date'])[3])[0] == date('H') ) { ?>
              <button type="button" data-toggle="modal" data-target="#date<?= $i; ?>" class="badge badge-info"><?= explode(' ', $pub['date'])[3] ?></button>
            <?php } else { ?>
              <button type="button" data-toggle="modal" data-target="#date<?= $i; ?>" class="badge badge-danger"><?= explode(' ', $pub['date'])[3] ?></button>
            <?php } ?>            
          </td>
          <td class="text-center">
            <a href="<?= base_url('home/info/').$pub['id'].'/ip'; ?>" class="badge badge-info"><?= explode(',', $pub['ip'])[0]; ?></a>
          </td>
          <td class="text-center">
            <a href="<?= base_url('home/info/').$pub['id'].'/port' ?>" class="badge badge-info">Port</a>
          </td>
          <td class="text-center">
            <?php if ( $pub['ssh_live'] ) { ?>
              <a href="<?= base_url('home/info/').$pub['id'].'/ssh' ?>" class="badge badge-danger">SSH</a>
            <?php } else { ?>
              <a href="<?= base_url('home/info/').$pub['id'].'/ssh' ?>" class="badge badge-info">SSH</a>
            <?php } ?>
          </td>
          <td class="text-center">
            <a href="<?= base_url('home/info/').$pub['id'].'/service' ?>" class="badge badge-info">Service</a>
          </td>
        </tr>
<!--          <div class="col-lg-3">
          <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                  <i class="tim-icons icon-atom text-info"></i>
                  <?= $pub['name']; ?>
                </h4>
                <div class="card-category">
                  <a href="<?= base_url('home/info/').$pub['id'].'/ip'; ?>" class="badge badge-info"><?= explode(',', $pub['ip'])[0]; ?></a>
                  <div class="float-right">
                    <?php if ( explode(':', explode(' ', $pub['date'])[3])[0] == date('H') ) { ?>
                      <button type="button" data-toggle="modal" data-target="#date<?= $i; ?>" class="badge badge-info"><?= explode(' ', $pub['date'])[3] ?></button>
                    <?php } else { ?>
                      <button type="button" data-toggle="modal" data-target="#date<?= $i; ?>" class="badge badge-danger"><?= explode(' ', $pub['date'])[3] ?></button>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="text-center"> 
                   <a href="<?= base_url('home/info/').$pub['id'].'/port' ?>" class="col-lg-3 badge badge-info">Port</a>
                  <?php if ( $pub['ssh_live'] ) { ?>
                    <a href="<?= base_url('home/info/').$pub['id'].'/ssh' ?>" class="col-lg-3 badge badge-danger">SSH</a>
                  <?php } else { ?>
                    <a href="<?= base_url('home/info/').$pub['id'].'/ssh' ?>" class="col-lg-3 badge badge-info">SSH</a>
                  <?php } ?>
                  <a href="<?= base_url('home/info/').$pub['id'].'/service' ?>" class="col-lg-3 badge badge-info">Service</a><br><br>
                </div>
                <h5 class="text text-grey">Disk : <strong><?= explode(',', $pub['disk'])[0]; ?></strong></h5>
                <div class="progress">
                  <div class="progress-bar bg-info" role="progressbar" style="width: <?= explode(',', $pub['disk'])[1]; ?>"></div>
                </div><br>
                <h5 class="text text-grey">RAM : <strong><?= explode(',', $pub['ram'])[0]; ?></strong></h5>
                <div class="progress">
                  <div class="progress-bar bg-info" role="progressbar" style="width: <?= explode(',', $pub['ram'])[1]; ?>"></div>
                </div>
              </div>
            </div>
          </div>
 -->          <!-- </div> -->

          <!-- Modal -->
          <div class="modal fade" id="date<?= $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="date<?= $i; ?>">Date Info</h3>
                  <button data="blue" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?= $pub['date']; ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        <!-- Modal -->
        <div class="modal fade" id="ssh_live<?= $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="ssh_live<?= $i; ?>">SSH Live</h3>
                <button data="blue" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                if ( $pub['ssh_live'] ) {
                  try {
                    foreach (explode(',', $pub['ssh_live']) as $ssh_live) {
                     echo $ssh_live.'<br>';
                    }
                  } catch (Exception $e) {
                    echo $pub['ssh_live'];
                  }                  
                } else {
                  echo '<div class="text text-danger"><b>Data Kosong !</b></div>';
                }
              ?>
            </div>
            <div class="modal-footer">
              <button type="button" data-toggle="modal" data-target="#ssh_failed<?= $i; ?>" class="btn btn-danger" data-dismiss="modal">SSH Failed</button>
              <button type="button" data-toggle="modal" data-target="#ssh_success<?= $i; ?>" class="btn btn-success" data-dismiss="modal">SSH Accepted</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="ssh_failed<?= $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="ssh_failed<?= $i; ?>">SSH Live</h3>
              <button data="blue" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
              try {
                foreach (explode(',', $pub['ssh_failed']) as $ssh_failed) {
                 echo $ssh_failed.'<br>';
               }
             } catch (Exception $e) {
              echo $pub['ssh_failed'];
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" data-toggle="modal" data-target="#ssh_live<?= $i; ?>" class="btn btn-danger" data-dismiss="modal">SSH Live</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ssh_success<?= $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="ssh_success<?= $i; ?>">SSH Live</h3>
            <button data="blue" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php 
            try {
              foreach (explode(',', $pub['ssh_success']) as $ssh_success) {
               echo $ssh_success.'<br>';
             }
           } catch (Exception $e) {
            echo $pub['ssh_success'];
          }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" data-toggle="modal" data-target="#ssh_live<?= $i; ?>" class="btn btn-danger" data-dismiss="modal">SSH Live</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="disk<?= $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="disk<?= $i; ?>">Disk Info</h3>
          <button data="blue" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Port <?= $i; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="ram<?= $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="ram<?= $i; ?>">RAM Info</h3>
          <button data="blue" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Port <?= $i; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>

  <?php $i = $i + 1 ?>
<?php endforeach; ?>

      </tbody>
    </table>

      </div>
    </div>

<footer class="footer">
  <div class="container-fluid">
    <div class="copyright">
      ©
      <script>
        document.write(new Date().getFullYear())
      </script> made with <i class="tim-icons icon-heart-2"></i> by
      <a target="_blank" href="https://github.com/strongpapazola" target="_blank">strongpapazola</a> for a better web.
    </div>
  </div>
</footer>
</div>
</div>

