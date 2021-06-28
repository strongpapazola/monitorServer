<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/jquery.terminal/js/jquery.terminal.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/jquery.terminal/css/jquery.terminal.min.css"/>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">

          <?php $i = 1; ?>
          <?php while ($i <= 10) : ?>
          <!-- <div class="row-lg-5"> -->
          <div class="col-lg-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="tim-icons icon-atom text-info"></i> Name Server</h3>
                <h5 class="card-category">IP ADDRESS<div class="float-right">[ tanggal ]</div></h5>
              </div>
              <div class="card-body">
                <script>
                $('card').terminal({
                    hello: function(what) {
                        this.echo('Hello, ' + what +
                                  '. Wellcome to this terminal.');
                    }
                }, {
                    greetings: 'My First Terminal'
                });
                </script>
              </div>
            </div>
          </div>
          <!-- </div> -->


        <?php $i = $i + 1 ?>
        <?php endwhile; ?>

        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> made with <i class="tim-icons icon-heart-2"></i> by
            <a href="https://github.com/strongpapazola" class="text text-info" target="_blank">strongpapazola</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  