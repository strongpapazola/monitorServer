
<div class="content">
  <meta http-equiv="refresh" content="60">

<!--                     <script>
                    function goBack() {
                      window.history.back();
                    }
                  </script>
                  <button class="btn btn-info" onclick="goBack()">Go Back</button><br><br>-->

                  <div class="row">
                    <div class="col">


                      <!-- Template -->
          <!--     <div class="card">
                <div class="card-header">
                  Port Info
                </div>
                <div class="card-body">
                  <h4 class="card-title">Information About Port Opened</h4>
                </div>
              </div>
            -->
            <?php if ( $service == 'ip' ) { ?>

              <div class="card">
                <div class="card-header">
                  IP Info
                </div>
                <div class="card-body">
                  <h4 class="card-title">Information About Internet Protocol</h4>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Internet Protocol</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $il = 1;
                      $ips = explode(',', $server['ip']);
                      foreach ($ips as $ip) : ?>
                        <tr>
                          <th scope="row"><?= $il; ?></th>
                          <td><?= $ip; ?></td>
                        </tr>
                        <?php $il++ ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>

            <?php } elseif ( $service == 'port' ) { ?>

              <div class="card">
                <div class="card-header">
                  Port Info
                </div>
                <div class="card-body">
                  <h4 class="card-title">Information About Port Opened</h4>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Protocol</th>
                        <th scope="col">Port</th>
                        <th scope="col">Service</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          // Maping data port
                      try {
                        $data = [];
                        foreach (explode(',', $server['port']) as $ports) {
                          $postsr = [];
                          foreach (explode(' ', $ports) as $port) {
                            array_push($postsr, $port);
                          }
                          array_push($data, $postsr);

                        }

                        $il = 1;
                        foreach ($data as $dat) { ?>
                          <tr>
                            <th scope="row"><?= $il; ?></th>
                            <td><?= $dat[0]; ?></td>
                            <td><?= $dat[1]; ?></td>
                            <td><?= $dat[2]; ?></td>
                          </tr>

                          <?php 
                          $il++;  
                        }
                      } catch (Exception $e) {
                        echo $server['port'];
                      }
                      ?>
                    </tbody>
                  </table>

                </div>
              </div>

            <?php } elseif ( $service == 'ssh' ) { ?>

              <div class="card">
                <div class="card-header bg-info">
                  <h4 class="">SSH Live</h4>
                </div>
                <div class="card-body">

                  <?php if ( $server['ssh_live'] ) { ?>


                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">User</th>
                          <th scope="col">IP</th>
                          <th scope="col">Jam</th>
                          <th scope="col">Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        try {
                          $il = 1;
                          foreach (explode(',', $server['ssh_live']) as $ssh_live) { 
                            $pecah = explode(' ', $ssh_live); ?>
                            <tr>
                              <th scope="row"><?= $il; ?></th>
                              <td><?= $pecah[0]; ?></td>
                              <td><a href="<?= base_url('trackip/index/').$pecah[1]; ?>" target="_blank"><?= $pecah[1]; ?></a></td>
                              <td><?= $pecah[4]; ?></td>
                              <td><?= $pecah[3].' '.$pecah[2]; ?></td>
                            </tr>
                            <?php $il++; }
                          } catch (Exception $e) { 
                            $pecah = explode(' ', $server['ssh_live']); ?>
                            <tr>
                              <th scope="row"><?= '1'; ?></th>
                              <td><?= $pecah[0]; ?></td>
                              <td><a href="<?= base_url('trackip/index/').$pecah[1]; ?>" target="_blank"><?= $pecah[1]; ?></a></td>
                              <td><?= $pecah[4]; ?></td>
                              <td><?= $pecah[3].' '.$pecah[2]; ?></td>
                            </tr>
                          <?php }                  ?>

                        </tbody>
                      </table>

                    <?php } else { ?>
                      <div class="text text-danger"><b>Data Kosong !</b></div><br>
                    <?php } ?>

                  </ul>
                </div>
              </div>

              <div class="card">
                <div class="card-header bg-success">
                  <h4>SSH Accepted</h4>
                </div>
                <div class="card-body">
                  <?php if ( $server['ssh_success'] ) { ?>


                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">User</th>
                          <th scope="col">IP</th>
                          <th scope="col">Jam</th>
                          <th scope="col">Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                        try {
                          $il = 1;
                          foreach (explode(',', $server['ssh_success']) as $ssh_success) { 
                            $pecah = explode(' ', $ssh_success); ?>
                            <tr>
                              <th scope="row"><?= $il; ?></th>
                              <td><?= $pecah[0]; ?></td>
                              <td><a href="<?= base_url('trackip/index/').$pecah[1]; ?>" target="_blank"><?= $pecah[1]; ?></a></td>
                              <td><?= $pecah[4]; ?></td>
                              <td><?= $pecah[3].' '.$pecah[2]; ?></td>
                            </tr>
                            <?php $il++;
                          }
                        } catch (Exception $e) { 
                         $pecah = explode(' ', $server['ssh_success']); ?>
                         <tr>
                          <th scope="row"><?= $il; ?></th>
                          <td><?= $pecah[0]; ?></td>
                          <td><a href="<?= base_url('trackip/index/').$pecah[1]; ?>" target="_blank"><?= $pecah[1]; ?></a></td>
                          <td><?= $pecah[4]; ?></td>
                          <td><?= $pecah[3].' '.$pecah[2]; ?></td>
                        </tr>
                      <?php }          
                      ?>

                    </tbody>
                  </table>

                <?php } else { ?>
                  <div class="text text-danger"><b>Data Kosong !</b></div><br>
                <?php } ?>

              </div>
            </div>

            <div class="card">
              <div class="card-header bg-danger">
                <h4>SSH Failed</h4>
              </div>
              <div class="card-body">

                <?php if ( $server['ssh_failed'] ) { ?>


                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">IP</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                      try {
                        $il = 1;
                        foreach (explode(',', $server['ssh_failed']) as $ssh_failed) { 
                          $pecah = explode(' ', $ssh_failed); ?>
                          <tr>
                            <th scope="row"><?= $il; ?></th>
                            <td><?= $pecah[0]; ?></td>
                            <td><a href="<?= base_url('trackip/index/').$pecah[1]; ?>" target="_blank"><?= $pecah[1]; ?></a></td>
                            <td><?= $pecah[4]; ?></td>
                            <td><?= $pecah[3].' '.$pecah[2]; ?></td>
                          </tr>
                          <?php $il++; }
                        } catch (Exception $e) { 
                          $pecah = explode(' ', $server['ssh_failed']); ?>
                          <tr>
                            <th scope="row"><?= '1'; ?></th>
                            <td><?= $pecah[0]; ?></td>
                            <td><a href="<?= base_url('trackip/index/').$pecah[1]; ?>" target="_blank"><?= $pecah[1]; ?></a></td>
                            <td><?= $pecah[4]; ?></td>
                            <td><?= $pecah[3].' '.$pecah[2]; ?></td>
                          </tr>
                        <?php }

                        ?>
                      </div>
                    </div>
                  </tbody>
                </table>  
              <?php } else { ?>
                <div class="text text-danger"><b>Data Kosong !</b></div><br>
              <?php } ?>

            <?php } elseif ( $service == 'service' ) { ?>

              <div class="card">
                <div class="card-header bg-info">
                  <h4>Service Info</h4>
                </div>
                <div class="card-body">
                  <!-- <h5 class="card-title">Control Your Service</h5> -->
                  <form method="POST" id="service_id" action="<?= base_url('home/service_list'); ?>">
                    <input type="hidden" name="id" value="<?= $server['id']; ?>">
                    <input type="hidden" name="name" value="<?= $server['name']; ?>">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Unit</th>
                          <th scope="col" class="text-center">Active</th>
                          <th scope="col" class="text-center">Sub</th>
                          <?php if ($this->session->userdata('role') == '1'): ?>
                            <th scope="col" class="text-center">Action</th>
                          <?php endif; ?>
                            <th scope="col" class="text-center">Execute</th>                        
                          <th scope="col" class="text-center">Load</th>
                          <th scope="col">Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $nomers = 1; ?>
                        <?php foreach ( explode(',,,', $server['service_list']) as $lines ) { ?> 
                          <?php $line = explode('...', $lines); ?> 
                          <?php if ($public_command['service_list']): ?>
                            <?php $service_command = explode('...', explode(',,,', $public_command['service_list'])[$nomers-1]); ?>
                          <?php endif ?>
                          <tr>
                            <td><?= $nomers; ?></td>
                            <td class=""><?= $line[0]; ?></td>
                            <input type="hidden" name="nameservice<?= $nomers; ?>" value="<?= $line[0]; ?>">
                            <?php if ( $line[2] == 'active' ) { ?>
                              <td class="text-center">
                                <div class="badge badge-success"><?= $line[2]; ?></div>
                              </td>
                            <?php } else { ?>
                              <td class="text-center">
                                <div class="badge badge-danger mx-auto"><?= $line[2]; ?></div>
                              </td>
                            <?php } ?>

                            <?php if ( $line[3] == 'running' or $line[3] == 'exited' ){ ?>
                              <td class="text-center"><div class="badge badge-warning"><?= $line[3]; ?></div></td>
                            <?php } else { ?>
                              <td class="text-center"><div class="badge badge-danger"><?= $line[3]; ?></div></td>
                            <?php } ?>

                            <?php if ($this->session->userdata('role') != '2'): ?>
                              <?php 
                                // if ($public_command['service_list']) {
                                //   if ( $service_command[1] == '1' ) { 
                                // } else {
                                  if ( $line[2] == 'active' ) {
                                // }
                              ?>
                                <td class="text-center">
                                  <label class="switch">
                                    <input type="checkbox" name="nameservicec<?= $nomers; ?>" value="1" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mematikan Service ini ?'))" checked>
                                    <span class="slider round"></span>
                                  </label>
                                </td>
                              <?php } else { ?>
                                <td class="text-center">
                                  <label class="switch">
                                    <input type="checkbox" name="nameservicec<?= $nomers; ?>" value="1" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Menyalakan Service ini ?'))">
                                    <span class="slider round"></span>
                                  </label>
                                </td>                            
                              <?php } ?>
                            <?php endif ?>
                              <?php if ( $public_command['service_list'] ){ ?>                              
                                <?php if ($service_command[2] == '1'){ ?>
                                  <td class="text-center"><div class="badge badge-success">Executed</div></td>
                                <?php } else { ?>
                                  <td class="text-center"><div class="badge badge-danger">Execute</div></td>
                                <?php } ?>
                              <?php } else { ?>
                                <td class="text-center"><div class="badge badge-warning">Not Detected</div></td>
                              <?php } ?>

                            <?php if ($line[1] == 'loaded'){ ?>
                              <td class="text-center"><div class="badge badge-success"><?= $line[1]; ?></div></td>
                            <?php } else { ?>
                              <td class="text-center"><div class="badge badge-danger"><?= $line[1]; ?></div></td>
                            <?php } ?>
                            <td><?= implode(' ', array_slice($line, 4)); ?>
                          </td>
                        </tr>
                        <?php $nomers++; ?>
                      <?php } ?>

                    </tbody>
                  </table>
                  <?php if ($this->session->userdata('role') != '2'): ?>
                    <button type="Submit" class="btn btn-info float-right">Submit</button>                  
                  <?php endif ?>
                </form>

              </div>
            </div>


          <?php } ?>
        </div>
      </div>
    </div>
