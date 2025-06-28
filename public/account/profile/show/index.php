<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Account - Profile";
include_once($root . '/private/Actions/Security/Method.php');
include_once($root . '/private/Actions/MoodColor.php');
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Logs/Logs.php');




MethodVerify("GET");
LogAction();
$mood = SelectedColor();
?>
<?php
include_once($root . '/private/Actions/Logs/Logs.php');


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
LogAction();
?>
<?php include_once($root . '/view/account/profile/show.php'); ?>


