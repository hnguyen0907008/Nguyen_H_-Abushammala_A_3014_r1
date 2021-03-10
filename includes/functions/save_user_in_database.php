<?php

function save_user_in_database($username,$password,$con){
    if(!check_unique_username($username,$con)){
        return false;
    }else{
        $stmt = $con->prepare("insert into users (username,password) values(:username,:password)");
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->bindParam(':password',md5($password),PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION['id'] = $con->lastInsertId();
        $_SESSION['last_successfully_login'] = '-';
        $_SESSION['total_successfully_login'] = 1;
        $_SESSION['total_failed_login'] = 0;
        
        return true;
    }
}

?>