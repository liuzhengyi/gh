<?php
session_start();
/**
 * login of admin module of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-31
 *
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);

require_once("../lib/access_control.php");

if ( ! empty($_SESSION['name']) ) {
    header("Location:/index.php");
    exit();
}

include('./tpl/login.php');
?>
