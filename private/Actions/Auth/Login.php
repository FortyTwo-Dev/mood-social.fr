<?php

use Dba\Connection;

require_once($root . '/private/Actions/Database/Connection.php');

// argon2id
session_start();
require('database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        $checkIfUserExists = Connection()->prepare('SELECT email, password FROM users WHERE email = ?');
        $checkIfUserExists->execute(array($user_email));

        if($checkIfUserExists->rowCount() > 0) {
            $usersInfos = $checkIfUserExists->fetch();

            if(password_verify($user_password, $usersInfos['mdp'])) {

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['email'] = $usersInfos['email'];
                $_SESSION['role'] = $usersInfos['role'];

                header('Location: allActus.php');
            }else{
                $errorMsg = "votre email ou mot de passe est incorect";
            }

        }else{
            $errorMsg = "votre email ou mot de passe est incorect";
        }

    }else{
        $errorMsg = "veuillez completer tous les champs. . .";
    }

    
}