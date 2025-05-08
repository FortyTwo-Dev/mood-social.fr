<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Logs/Logs.php');


header('Content-Type: application/json');

$stmt = Connection()->query("SELECT content, question, answer FROM CAPTCHAS ORDER BY RAND() LIMIT 1");
$captcha = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$captcha) {
    echo json_encode(['error' => 'No CAPTCHA available']);
    exit;
}

$_SESSION['captcha_answer'] = $captcha['answer'];
$shape = ['triangle', 'cercle', 'carré'][array_rand([1,2,3])];

$svg = generateSVG($shape, $captcha['content']);

$options = [$captcha['answer'], $shape, "$shape {$captcha['answer']}"];
shuffle($options);

echo json_encode([
    'svg' => $svg,
    'question' => $captcha['question'],
    'options' => $options
]);

function generateSVG($shape, $class) {
    switch ($shape) {
        case 'cercle':
            return "<svg class='fill-ms-{$class} stroke-0' width='100' height='100' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'><circle cx='50' cy='50' r='40'/></svg>";
        case 'carré':
            return "<svg class='fill-ms-{$class} stroke-0' width='100' height='100' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'><rect width='80' height='80' x='10' y='10' /></svg>";
        case 'triangle':
            return "<svg class='fill-ms-{$class} stroke-0' width='100' height='100' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'><polygon points='50,10 90,90 10,90' /></svg>";
        default:
            return '';
    }
}

LogAction();