<?php
/**
 * 
 */
function check_login() {
    global $_cfg_siteRootAdmin;
    if (empty($_SESSION['name'])) {
        output_json_error(-1001, '请登录.', $_cfg_siteRootAdmin.'login.php');
    }
}

?>
