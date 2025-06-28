<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $page_title = 'MoodSocial - Feed General';

    include_once($root . '/private/Actions/Security/Method.php');
    include_once($root . '/private/Actions/Security/User.php');
    
    include_once($root . '/private/Actions/MoodColor.php');

    include_once($root . '/private/Actions/Database/Query/Message.php');
    include_once($root . '/private/Actions/Database/Query/Mood.php');

    include_once($root . '/private/Actions/Logs/Logs.php');

    MethodVerify("GET");
    $mood = SelectedColor();
    LogAction();

    if (!EmailVerified()) { ToRoute('/'); }
    if (!IsAuth()) { ToRoute('/auth/login/'); }
    if (!HaveUsername()) { ToRoute('/auth/username/'); }

    $messages = GetFeedMessages();
?>
<?php
$userId = GetUserId();


$sql = "
    SELECT c.category, c.image
    FROM USER_CUSTOM uc
    JOIN CUSTOMS c ON uc.custom_id = c.id
    WHERE uc.user_id = ?
";
$stmt = Connection()->prepare($sql);
$stmt->execute([$userId]);

$customs = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($customs as $custom) {
    $image[$custom['category']] = base64_encode(file_get_contents($root . '/storage/customs/' . $custom['category'] . '/' . $custom['image']));
}
?>

<?php include( $root . '/view/talk/feed/index.php' ) ?>