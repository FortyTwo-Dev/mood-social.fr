<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Request/User/StoreRequest.php');
include_once($root . '/private/Request/User/LoginRequest.php');
include_once($root . '/private/Actions/Email/Email.php');


function Register() {

    $request = StoreValidation();

    $query = "INSERT INTO USERS (email, password) VALUES (:email, :password)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':email', $request['email']);
    $stmt->bindValue(':password', password_hash($request['password'], 'argon2id'));
    
    $stmt->execute();

    $_SESSION['auth'] = 1;
    $_SESSION['email'] = $request['email'];
    $_SESSION['role'] = 1;

    header('Location: /');
}

function Login() {

    $request = LoginValidation();

    $_SESSION['auth'] = 1;
    $_SESSION['email'] = $request['email'];
    $_SESSION['role'] = $request['role'];

    // $body = '
    //         <!DOCTYPE html>
    //         <html lang="fr">

    //         <head>

    //             <meta charset="UTF-8">
    //             <meta name="viewport" content="width=device-width, initial-scale=1.0">
    //             <title>Confirmation de compte</title>


    //             <style>
    //                 body {
    //                     font-family: Arial, sans-serif;
    //                     padding: 20px;
    //                 }
    //                 table {
    //                     width: 100%;
    //                     max-width: 800px;
    //                     margin: 0 auto;
    //                     border-radius: 10px;
    //                     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    //                     padding: 20px;
    //                 }
    //                 .logo-container {
    //                     position: relative;
    //                     top: -60px;
    //                     text-align: center;
    //                     padding-top: 5px;
    //                 }
    //                 .logo-container img {
    //                     width: 50px;
    //                     background: white;
    //                     padding: 10px;
    //                 }
    //                 .button {
    //                     display: inline-block;
    //                     background: #838485;
    //                     color: #EFF1EF;
    //                     padding: 12px 24px;
    //                     border-radius: 5px;
    //                     font-size: 16px;
    //                     font-weight: bold;
    //                     margin-top: 30px;
    //                     text-decoration: none;
    //                 }
    //                 .paragraph {
    //                     padding-top: 30px;
    //                 }
    //                 .footer {
    //                     font-size: 12px;
    //                     color: #888;
    //                     text-align: center;
    //                 }
    //             </style>


    //         </head>

    //         <body>

    //             <table>
    //                 <tr>
    //                     <td class="logo-container"><img src="http://mood-social.test/resources/assets/svg/logo.svg" alt="MoodSocial" width="150"></td>
    //                 </tr>
    //                 <tr>
    //                     <td class="paragraph">Afin de valider la création de votre compte MoodSocial, cliquer sur le bouton ci-dessous :</td>
    //                 </tr>
    //                 <tr>
    //                     <td align="center">
    //                         <a href="#" class="button">Valider</a>
    //                     </td>
    //                 </tr>
    //                 <tr>
    //                     <td class="paragraph">Si ce lien ne fonctionne pas, veuillez copier-coller le lien suivant dans votre navigateur :</td>
    //                 </tr>
    //                 <tr>
    //                     <td class="paragraph"><a href="#">https://lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-curabitur-vestibulum-ac-quam-id-blandit.com</a></td>
    //                 </tr>
    //                 <tr>
    //                     <td class="paragraph">Cordialement,</td>
    //                 </tr>
    //                 <tr>
    //                     <td class="paragraph">L’équipe MoodSocial.</td>
    //                 </tr>
    //             </table>
    //             <p class="footer">Envoyé par test@example.com</p>
    //         </body>
    //         </html>
    //         ';


    // SendEmail('test@exemple.com', 'MoodSocial', 'recipient@test.com', 'New account', $body);

    header('Location: /');
}

function Logout() {
    session_destroy();
    header('Location: /');
    die();
}