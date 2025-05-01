<?
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function LogAction(string $action_type) {
    $user_id = GetUserId();
    $stmt = Connection()->prepare("
        INSERT INTO LOGS (user_id, action_type, ip, status)
        VALUES (:user_id, :action_type, :ip, :status);
    ");
    $stmt->bindParam(':action_type', $action_type, is_null($action_type) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, is_null($user_id) ? PDO::PARAM_NULL : PDO::PARAM_INT);
    $stmt->bindParam(':ip',$_SERVER['REMOTE_ADDR'], is_null($_SERVER['REMOTE_ADDR']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':status',$_SERVER['REDIRECT_STATUS'], is_null($_SERVER['REDIRECT_STATUS']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->execute();
    
}
