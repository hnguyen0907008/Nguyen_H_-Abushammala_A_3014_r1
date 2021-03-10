<?php


function check_unique_username($username,$con){
    $stmt = $con->prepare("select username from users where username = :value");
    $stmt->bindParam(':value',$username,PDO::PARAM_STR);
    $stmt->execute();
    
    if($stmt->rowCount() == 0) 
        return true;
    return false;
}
