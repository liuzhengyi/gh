<?php
session_start();
/**
 * manage self info 
 * author:  gipsaliu@gmail.com
 * since:   2014-04-05
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);

require_once("../lib/access_control.php");
check_login();

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

$content    = empty($_GET['content']) ? '' : trim($_GET['content']);

$id = $_SESSION['id'];

// user info
$sql        = "select * from user where user_id = :id limit 1";
$sth        = $dbh->prepare($sql);
$sth->bindValue(':id', $id, PDO::PARAM_INT);
$sth->execute();
$data  = $sth->fetch(PDO::FETCH_ASSOC);

include('./tpl/self.php');

?>
