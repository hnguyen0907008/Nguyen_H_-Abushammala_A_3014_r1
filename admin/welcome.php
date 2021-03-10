<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location: ../index.php');
        exit();
    }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Welcome Page </title>
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
    </head>
    <body class="welcome-page">
        <div id="app" class="container-fluid p-0 h-100">
            <div class="row m-0 h-100">
                <div class="col-12 header">
                    <label class="text-white font-weight-bold mt-2 ml-2">abdalrahman.</label>
                    <button class="float-right btn btn-success mt-1"><a href="logout.php" class="text-white">Logout</a></button>
                </div>
                <div class="col-12">
                    <div class="m-auto content">
                        <img src="../images/dashboard.png">
                        <div class="row justify-content-center">
                            <div class="col-3 items text-center pt-3 mr-2">
                                <label class="d-block">Last Access</label>
                                <label class="font-weight-bold"><?php echo $_SESSION['last_successfully_login'];?></label>
                            </div>
                            <div class="col-3 items text-center pt-3 mr-2">
                                <label class="d-block">Login Successfully</label>
                                <label class="font-weight-bold"><?php echo $_SESSION['total_successfully_login'];?> Times</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    ob_end_flush();
?>