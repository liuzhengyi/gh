<?php
/**
 * index of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-11
 *
 */

include_once('./config.php');

require_once("./common.php");
require_once($_cfg_dbConfFile);

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// ad data
$sql        = "select * from ad";
$sth        = $dbh->prepare($sql);
$sth->execute();
$ad_data       = $sth->fetchAll(PDO::FETCH_ASSOC);

include('./tpl/admin/admin.php');
?>
