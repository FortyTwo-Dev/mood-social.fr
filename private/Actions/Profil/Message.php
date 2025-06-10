<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Profil/StoreRequest.php');

function Store() {

    $request = StoreValidation();
    $token = bin2hex(random_bytes(32));

    $query = "UPDATE USERS SET email = :email, email_verified_at = NULL, email_verification_token = :email_verification_token, email_verification_expiration = :email_verification_expiration WHERE id = :user_id";
    $stmt = Connection()->prepare($query);

    $stmt->bindParam(':email', $request['email'], is_null($request['email']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $request['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':email_verification_token', $token);
    $stmt->bindValue(':email_verification_expiration', 60*60, PDO::PARAM_INT);

    
    $stmt->execute();

    $_SESSION['email'] = $request['email'];

    $url = GenerateSignedRoute($token, $_SERVER['HTTP_HOST'] . '/auth/verify-email/?id=' . $request['user_id'] . '&');

    var_dump($request['email']);
    $body = '
            <!DOCTYPE html>
            <html lang="fr">

            <head>

                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Confirmation de compte</title>


                <style>
                    body {
                        font-family: Arial, sans-serif;
                        padding: 20px;
                    }
                    table {
                        width: 100%;
                        max-width: 800px;
                        margin: 0 auto;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                    }
                    .logo-container {
                        position: relative;
                        top: -60px;
                        text-align: center;
                        padding-top: 5px;
                    }
                    .logo-container img {
                        width: 50px;
                        background: white;
                        padding: 10px;
                    }
                    .button {
                        display: inline-block;
                        background: #838485;
                        color: #EFF1EF;
                        padding: 12px 24px;
                        border-radius: 5px;
                        font-size: 16px;
                        font-weight: bold;
                        margin-top: 30px;
                        text-decoration: none;
                    }
                    .paragraph {
                        padding-top: 30px;
                    }
                    .footer {
                        font-size: 12px;
                        color: #888;
                        text-align: center;
                    }
                </style>


            </head>

            <body>

                <table>
                    <tr>
                        <td class="logo-container"><img src="'.$_SERVER['HTTP_HOST'].'/resources/assets/svg/logo.svg" alt="MoodSocial" width="150"></td>
                    </tr>
                    <tr>
                        <td class="paragraph">Afin de valider la création de votre compte MoodSocial, cliquer sur le bouton ci-dessous :</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <a href="'.$url.'" class="button">Valider</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="paragraph">Si ce lien ne fonctionne pas, veuillez copier-coller le lien suivant dans votre navigateur :</td>
                    </tr>
                    <tr>
                        <td class="paragraph"><a href="'.$url.'">'.$url.'</a></td>
                    </tr>
                    <tr>
                        <td class="paragraph">Cordialement,</td>
                    </tr>
                    <tr>
                        <td class="paragraph">L’équipe MoodSocial.</td>
                    </tr>
                </table>
                <p class="footer">Envoyé par no-reply@mood-social.com</p>
            </body>
            </html>
            ';

    SendEmail('MoodSocial', 'lefortjiji@gmail.com' , 'Verification de votre compte', $body);

    ToRoute(Back());
}