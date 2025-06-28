<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Request/Newsletter/StoreRequest.php');
// include_once($root . '/private/Request/Captcha/UpdateRequest.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Email/Email.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function Store() {

    $request = StoreValidation();
    $head = "
        <!DOCTYPE html>
        <html lang=\"fr\">
        <head>

            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
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
            ";

    $logo = "
        <body>
        <table>
            <tr>
                <td class=\"logo-container\"><img src=\"https://". $_SERVER['HTTP_HOST'] ."/resources/assets/svg/logo.svg\" alt=\"MoodSocial\" width=\"150\"></td>
            </tr>
            ";
    $content = "
        <tr>
            <td class=\"paragraph\">{$request['title']}</td>
        </tr>
        <tr>
            <td class=\"paragraph\">" . nl2br(html_entity_decode($request['content'])) . "</td>
        </tr>
            ";
    $action = "";
    if ($request['action'] != "") {
        $action = "
            <tr>
                <td align=\"center\">
                    <a href=\"{$request['url']}\" class=\"button\">{$request['action']}</a>
                </td>
            </tr>
                ";
    }

    $footer = "
                    <tr>
                        <td class=\"paragraph\">Cordialement,</td>
                    </tr>
                    <tr>
                        <td class=\"paragraph\">L’équipe MoodSocial.</td>
                    </tr>
                </table>
                <p class=\"footer\">Envoyé par no-reply@mood-social.com</p>
            </body>
        </html>
            ";

    $email = $head . $logo . $content . $action . $footer;
    $query = "INSERT INTO NEWSLETTERS (object, content, user_id) VALUES (:object, :content, :user_id)";
    $stmt = Connection()->prepare($query);

    $stmt->bindValue(':object', $request['object']);
    $stmt->bindValue(':content', $email);
    $stmt->bindValue(':user_id', $request['user_id']);
    
    $stmt->execute();

    SendEmails('MoodSocial', GetAllUsers('email'), $request['object'], $email);

    ToRoute('/dashboard/newsletter/', "Newsletter {$request['object']} créé et envoyé avec succès", 'success');
}