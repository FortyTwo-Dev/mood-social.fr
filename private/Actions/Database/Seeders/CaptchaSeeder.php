<?php
include_once($root . '/private/Actions/Database/Database.php');

function CaptchaSeeder(PDO $conn) {
    $captchas = [
        [ 'title' => "Rouge", 'content' => "red", 'question' => "Quelle est cette couleur ?", 'answer' => 'rouge' ],
        [ 'title' => "Jaune", 'content' => "yellow", 'question' => "Quelle est cette couleur ?", 'answer' => 'jaune' ],
        [ 'title' => "Bleu", 'content' => "blue", 'question' => "Quelle est cette couleur ?", 'answer' => 'bleu' ],
        [ 'title' => "Violet", 'content' => "purple", 'question' => "Quelle est cette couleur ?", 'answer' => 'violet' ]
    ];
    $query = "INSERT INTO CAPTCHAS (title, content, question, answer, user_id) VALUES (:title, :content, :question, :answer, :user_id)";
    $stmt = $conn->prepare($query);
    
    foreach ($captchas as $captcha) {
        try {
    
            $stmt->bindParam(':title', $captcha['title']);
            $stmt->bindParam(':content', $captcha['content']);
            $stmt->bindParam(':question', $captcha['question']);
            $stmt->bindParam(':answer', $captcha['answer']);
            $stmt->bindValue(':user_id', 1, PDO::PARAM_INT);
    
            $stmt->execute();
    
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion pour le captcha " . $captcha['title'] . ": " . $e->getMessage();
        }
    }
}