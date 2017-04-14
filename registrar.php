<?php include 'inc/header.php'; ?>
<?php
if(isset($_POST['sub'])){
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    
    if(empty($name) || empty($email) || empty($password) || empty($pass2) ){
        echo 'Sorry, please enter all fields';
        
    }else{
        $selectAll = "SELECT * FROM `users` WHERE u_email='$email' AND u_pass='$password'";
        $result    = $conn->query($selectAll);
        if($result->num_rows > 0){
            echo 'This email already exists <a class="btn" href="login.php">Login</a>';
        }
        elseif($password <= 7) {
            echo "Password must be greater than 8";
        }elseif ($pass2 != $password) {
            echo 'Passwords don\'t match';
        } else {
          $sqlUSER = "INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_pass`) VALUES (NULL, '$name', '$email', '$password');";  
          $conn->query($sqlUSER);
          echo 'Great, you have registered with us';
        }
    }
}

?>
<div class="container">
                <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                                <h3 class="panel-title">Please sign up  <small>It's free!</small></h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <form method="POST"  role="form">
                                                    <div class="form-group">
                                                        <input type="text" name="name" id="first_name" class="form-control input-sm" placeholder="First Name">
                                                    </div>

                                                        <div class="form-group">
                                                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                                                        </div>

                                                        <div class="row">
                                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="password" name="pass" id="password" class="form-control input-sm" placeholder="Password">
                                                                        </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="password" name="pass2" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                                                        </div>
                                                                </div>
                                                        </div>

                                                    <input name="sub" type="submit" value="Register" class="btn btn-info btn-block">

                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
            </div>
<?php include 'inc/footer.php'; ?>