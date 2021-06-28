  <div class="wrapper">
    <div class="sidebar" data="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
              <i class="tim-icons icon-laptop"></i>
          </a>
          <a href="<?= base_url(); ?>" class="simple-text logo-normal">
            Dashboard
          </a>
        </div>
        <ul class="nav">

          <?php if (role('public')): ?>          
            <?php if ( $active == 1 ) { ?>
              <li class="active ">
            <?php } else { ?>
              <li class="">
            <?php } ?>
              <a href="<?= base_url('home/publik'); ?>">
                <i class="tim-icons icon-planet"></i>
                <p>Public</p>
              </a>
            </li>
          <?php endif ?>

          <?php if (role('local')): ?>          
            <?php if ( $active == 2 ) { ?>
              <li class="active ">
            <?php } else { ?>
              <li class="">
            <?php } ?>
              <a href="<?= base_url('home/local'); ?>">
                <i class="tim-icons icon-app"></i>
                <p>Local</p>
              </a>
            </li>
          <?php endif ?>

          <?php if (role('trackip')): ?>          
            <?php if ( $active == 3 ) { ?>
              <li class="active ">
            <?php } else { ?>
              <li class="">
            <?php } ?>
              <a href="<?= base_url('trackip'); ?>">
                <i class="tim-icons icon-planet"></i>
                <p>Track IP</p>
              </a>
            </li>
          <?php endif ?>

          <?php if (role('custom_control')): ?>          
            <?php if ( $active == 4 ) { ?>
              <li class="active ">
            <?php } else { ?>
              <li class="">
            <?php } ?>
              <a href="<?= base_url('customcontrol'); ?>">
                <i class="tim-icons icon-laptop"></i>
                <p>Custom Control</p>
              </a>
            </li>
          <?php endif ?>


          <?php if ( role('user_manage') ) { ?>            
            <?php if ( $active == 5 ){ ?>
              <li class="active">              
            <?php } else { ?>
              <li class="">
            <?php } ?>
              <a href="<?= base_url('home/user'); ?>">
                <i class="tim-icons icon-single-02"></i>
                <p>User Manage</p>
              </a>
            </li>
          <?php } ?>

          <li>
            <a href="<?= base_url('auth/logout'); ?>">
              <i class="tim-icons icon-button-power"></i>
              <p>Logout</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
