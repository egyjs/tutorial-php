<?php include 'inc/header.php'; ?>
<?php
// UPDATE `users` SET `u_name` = 'elzahaby' WHERE `users`.`u_id` = 1;
if(isset($_POST['save'])){
    $id   = $_SESSION['Uid'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    //var_dump($name);
    $sqlEDIT = "UPDATE users SET u_name= '$name'  WHERE `users`.`u_id` = $id";
    $conn->query($sqlEDIT);
    $_SESSION['Uname'] = $name;
}


?>
<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <!--div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div-->
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        
        <form method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">name:</label>
            <div class="col-lg-8">
                <input name="name" class="form-control" type="text" value="<?= $_SESSION['Uname']; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
                <input class="form-control" name="email" type="text" value="<?= $_SESSION['Uemail']; ?>" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
                <input class="form-control" name="pass" type="password" value="<?= $_SESSION['Upass']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <input name="save" type="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
<?php include 'inc/footer.php'; 
