<?php

function increment_total_failed_login($username,$con){
    $stmt = $con->prepare("update users set total_failed_login=total_failed_login+1 where username=:username");
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->execute();
}

?>