<div class="content">
    <div class="card col-lg-7">
      <div class="card-body">
        <h4 class="card-title">Custom Control Detail</h4><br>
        <form id="service_id" action="" method="POST">
<table class="table">
    <tr>
      <th scope="col" class="text text-light">Name</th>
      <td><?= $customcontrol['name'] ?></td>
    </tr>
    <tr>
      <th scope="col" class="text text-light">Description</th>
      <td><?= $customcontrol['description'] ?></td>
    </tr>
    <tr>
      <th scope="col" class="text text-light">vcon.bisaai.id<br>ehosdev.javafirst.id<br>elearning.bisaai.id</th>
      <td>
        <?php if ($customcontrol['command'] == '1'): ?>
          <label class="switch">
            <input type="radio" name="command" value="1" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))" checked="">
            <span class="slider round"></span>
          </label><br>
          <label class="switch">
            <input type="radio" name="command" value="2" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))">
            <span class="slider round"></span>
          </label>  <br>      
          <label class="switch">
            <input type="radio" name="command" value="3" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))">
            <span class="slider round"></span>
          </label>          
        <?php endif ?>
        <?php if ($customcontrol['command'] == '2'): ?>
          <label class="switch">
            <input type="radio" name="command" value="1" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))">
            <span class="slider round"></span>
          </label><br>
          <label class="switch">
            <input type="radio" name="command" value="2" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))" checked="">
            <span class="slider round"></span>
          </label><br>      
          <label class="switch">
            <input type="radio" name="command" value="3" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))">
            <span class="slider round"></span>
          </label>          
        <?php endif ?>
        <?php if ($customcontrol['command'] == '3'): ?>
          <label class="switch">
            <input type="radio" name="command" value="1" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))">
            <span class="slider round"></span>
          </label><br>
          <label class="switch">
            <input type="radio" name="command" value="2" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))" >
            <span class="slider round"></span>
          </label><br>      
          <label class="switch">
            <input type="radio" name="command" value="3" onchange="document.getElementById('service_id').submit()" onclick="return(confirm('Kamu Yakin Akan Mengubah Service ini ?'))" checked="">
            <span class="slider round"></span>
          </label>          
        <?php endif ?>
      </td>
    </tr>
<!--    <tr>
      <td><button class="btn btn-info">Submit</button></td>
    </tr> -->
</table>
        </form>
      </div>
    </div>
</div>
