<?php

const FOUNDED = 1;
const LOCKED_ACCOUNT = 2;
const NOT_FOUND = 3;

function check_user_in_database($username,$password,$con){
    $stmt = $con->prepare("select id,last_successfully_login,total_successfully_login,total_failed_login from users where username=:username and password=:password");
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->bindParam(':password',$password,PDO::PARAM_STR);
    $stmt->execute();
    
    if($stmt->rowCount()>0){
        increment_total_successfully_login($username,$con);
        $stmt->execute();
        $row = $stmt->fetch();
        if($row['total_failed_login'] >= 3)
            return LOCKED_ACCOUNT;
        foreach($row as $key => $value){
            $_SESSION[$key] = $value;
        }
        return FOUNDED;
    }else{
        if(!check_unique_username($username,$con)){
            increment_total_failed_login($username,$con);
            if(get_total_failed_login($username,$con)){
                return LOCKED_ACCOUNT;
            }
        }
    }
    return NOT_FOUND;
}
?>