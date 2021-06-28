<div class="content">
    <div class="card col-lg-7">
      <div class="card-body">
        <h4 class="card-title">Custom Control
            <!-- <a class="btn btn-info float-right" href="">Tambah Control</a> -->
        </h4>
        <p class="card-text">For custom control content of the server.</p>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col" class="text-center">Action</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customcontrol as $cus) : ?>
                <tr>
                  <th scope="row">1</th>
                  <td><?= $cus['name']; ?></td>
                    <td class="text-center">
                      <a class="badge badge-info" href="customcontrol/detail/<?= $cus['id']; ?>">Detail</a>
                    </td>
                  <td><?= $cus['description']; ?></td>
                </tr>
            <?php endforeach; ?>
              </tbody>
            </table>
        </form>
      </div>
    </div>
</div>