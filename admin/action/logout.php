<?php
session_start();

include_once('../../config.php');

require_once("../../lib/common.php");

session_unset();

output_json_info('您已登出系统!', $_cfg_siteRootAdmin.'login.php');
?>
