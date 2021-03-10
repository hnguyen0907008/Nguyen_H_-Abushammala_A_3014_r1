<?php

function increment_total_successfully_login($username,$con){
    $stmt = $con->prepare("update users set total_successfully_login=total_successfully_login+1,last_successfully_login=now() where username=:username and total_failed_login< 3");
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->execute();
}

?>