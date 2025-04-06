<?php
require_once($root . '/private/Actions/Database/Connection.php');

// argon2id
session_start();
require('database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['name']) AND !empty($_POST['password'])){
        $user_name = htmlspecialchars($_POST['name']);
        $user_password = htmlspecialchars($_POST['password']);

        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE name = ?');
        $checkIfUserExists->execute(array($user_name));

        if($checkIfUserExists->rowCount() > 0) {
            $usersInfos = $checkIfUserExists->fetch();

            if(password_verify($user_password, $usersInfos['mdp'])) {

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['name'] = $usersInfos['name'];
                $_SESSION['role'] = $usersInfos['role'];

                header('Location: allActus.php');
            }else{
                $errorMsg = "votre name ou mot de passe est incorect";
            }

        }else{
            $errorMsg = "votre name ou mot de passe est incorect";
        }

    }else{
        $errorMsg = "veuillez completer tous les champs. . .";
    }

    
}