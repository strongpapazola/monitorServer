<div class="content">
    <div class="card">
      <div class="card-header">
        <h3>User Manager <a href="<?= base_url('home/register'); ?>" class="btn btn-info float-right">Add User</a></h3>
      </div>
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th class="text-center" scope="col">Public Server</th>
              <th class="text-center" scope="col">Local Node</th>
              <th class="text-center" scope="col">Track IP</th>
              <th class="text-center" scope="col">Custom Control</th>
              <th class="text-center" scope="col">User Manage</th>
              <th class="text-center" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

          <?php $i = 1; ?>
          <?php foreach ($user as $use) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $use['username']; ?></td>
              <td class="text-center">
                <?php if ($use['public'] == 1) { ?>
                  <div class="badge badge-success">ON</div>
                <?php } else { ?>
                  <div class="badge badge-danger">OFF</div>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($use['local'] == 1) { ?>
                  <div class="badge badge-success">ON</div>
                <?php } else { ?>
                  <div class="badge badge-danger">OFF</div>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($use['trackip'] == 1) { ?>
                  <div class="badge badge-success">ON</div>
                <?php } else { ?>
                  <div class="badge badge-danger">OFF</div>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($use['custom_control'] == 1) { ?>
                  <div class="badge badge-success">ON</div>
                <?php } else { ?>
                  <div class="badge badge-danger">OFF</div>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($use['user_manage'] == 1) { ?>
                  <div class="badge badge-success">ON</div>
                <?php } else { ?>
                  <div class="badge badge-danger">OFF</div>
                <?php } ?>
              </td>
              <td class="text-center"><a href="<?= base_url('home/user_detail/').$use['id']; ?>" class="badge badge-info">Change</a></td>
            </tr>
          <?php $i++ ?>
          <?php endforeach; ?>

          </tbody>
        </table>

      </div>
    </div>
</div>