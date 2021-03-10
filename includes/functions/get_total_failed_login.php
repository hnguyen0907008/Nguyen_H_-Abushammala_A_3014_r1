<?php

function get_total_failed_login($username,$con){
    $stmt = $con->prepare("select total_failed_login from users where username=:username");
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetch();
    if($row['total_failed_login'] >= 3){
        return true;
    }else{
        return false;
    }
}
?>