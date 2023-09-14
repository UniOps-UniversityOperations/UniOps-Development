<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    try{
        require_once "../config/dbh.config.php";
        require_once "../models/login.model.php";
        require_once "../controllers/login.contr.php";

        //error handlers
        $errors = [];

        if(is_input_empty($username, $password)){
            $errors["empty_input"] = "Fill in all fields";
        }

        $result = get_user($pdo, $username);

        if(is_username_wrong($result)){
            $errors["wrong_username"] = "Username does not exist";
        }

        if(!is_username_wrong($result) && is_pasword_wrong($password, $result["password"])){
            $errors["wrong_password"] = "Wrong password, <br> entered password =*" .  $password . "*<br> hashed password = *" . $result["password"] . "*" ;
        }

        require_once "config_session.inc.php";

        if($errors){
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $new_session_id = session_create_id();
        $sessionId = $new_session_id . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../ok.html");

        $pdo = null;
        $stmt = null;
        die();

    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }


}else{
    header("Location: ../index.php");
    die();
}