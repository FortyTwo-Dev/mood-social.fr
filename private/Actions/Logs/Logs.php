<?
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function LogAction(string $action_type) {
    $user_id = GetUserId();
    $stmt = Connection()->prepare("
        INSERT INTO LOGS (user_id, script_name, ip, status, http_referer, request_uri, request_method, server_protocol, http_user_agent)
        VALUES (:user_id, :script_name, :ip, :status, :http_referer, :request_uri, :request_method, :server_protocol, :http_user_agent);
    ");
    $stmt->bindParam(':user_id', $user_id, is_null($user_id) ? PDO::PARAM_NULL : PDO::PARAM_INT);
    $stmt->bindParam(':ip',$_SERVER['REMOTE_ADDR'], is_null($_SERVER['REMOTE_ADDR']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':status',$_SERVER['REDIRECT_STATUS'], is_null($_SERVER['REDIRECT_STATUS']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':script_name', $_SERVER['SCRIPT_NAME'], is_null($_SERVER['SCRIPT_NAME']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':http_referer', $_SERVER['HTTP_REFERER'], is_null($_SERVER['HTTP_REFERER']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':request_uri', $_SERVER['REQUEST_URI'], is_null($_SERVER['REQUEST_URI']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':request_method', $_SERVER['REQUEST_METHOD'], is_null($_SERVER['REQUEST_METHOD']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':server_protocol', $_SERVER['SERVER_PROTOCOL'], is_null($_SERVER['SERVER_PROTOCOL']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->bindParam(':http_user_agent', $_SERVER['HTTP_USER_AGENT'], is_null($_SERVER['HTTP_USER_AGENT']) ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $stmt->execute();
}