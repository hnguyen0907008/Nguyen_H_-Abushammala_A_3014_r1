<?php
session_start();

$IS_LOCKED = "d-none";
$ERROR_CREDENTIALS = "d-none";
$EMAIL_TAKEN = "d-none";

include_once "includes/connect_db.php";
include_once "includes/functions/increment_total_successfully_login.php";
include_once "includes/functions/increment_total_failed_login.php";
include_once "includes/functions/get_total_failed_login.php";
include_once "includes/functions/check_unique_username.php";
include_once "includes/functions/check_user_in_database.php";
include_once "includes/functions/save_user_in_database.php";

if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['signin'])){
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);

    $returned_value = check_user_in_database($username,$password,$con);
    if($returned_value == FOUNDED){
        header('location: admin/welcome.php');
    }elseif($returned_value == LOCKED_ACCOUNT){
        $IS_LOCKED = "";
    }elseif($returned_value == NOT_FOUND){
        $ERROR_CREDENTIALS = "";
    }else{
        //
    }
}elseif($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['signup'])){
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if(save_user_in_database($username,$password,$con)){
        header('location: admin/welcome.php');
        exit();
    }else{
        $EMAIL_TAKEN = "";
    }
}else{

}

?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> User Login </title>        
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body class="login-page">
        <div id="app" class="container-fluid p-0 h-100">
            <div class="row m-0 h-100">
                <div class="m-auto content">
                    <div class="welcome-text mb-2">
                        <i class="fa fa-male text-danger"></i>
                        <span class="text-white font-weight-bold">Welcome To Your Account</span>
                    </div>
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label class="text-white" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                            <label class="text-danger <?php echo $IS_LOCKED; ?>">Your Account has been locked.</label>
                            <label class="text-danger <?php echo $ERROR_CREDENTIALS; ?>">These credentials do not match our records.</label>
                            <label class="text-danger <?php echo $EMAIL_TAKEN; ?>">This username is already taken.</label>
                        </div>
                        <div class="form-group position-relative">
                            <label class="text-white" for="password">Password</label>
                            <input :type="type" id="password" name="password" class="form-control" placeholder="Password">
                            <i class="fa fa-eye eye cursor-pointer" @click="displayPassword"></i>
                        </div>
                        <div class="row m-0 p-0">
                            <input type="submit" name="signin" class="col-5 btn btn-warning" value="Login" >
                            <input type="submit" name="signup" class="col-5 offset-2 btn btn-success text-dark" value="Register New Account" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script src="js/plugin.js"></script>
    </body>
</html>

<?php
    ob_end_flush();
?>