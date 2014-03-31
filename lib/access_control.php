<?php
/**
 * 
 */
function check_login() {
    if (empty($_SESSION['name'])) {
        output_json_error(-1001, '请登录.', '/login.php');
    }
}

?>
