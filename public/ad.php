<?php
/**
 * imgad detail page
 * author:  gipsaliu@gmail.com
 * since:   2014-04-05
 *
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);

// get and check params
if ( empty($_GET['id'])) {
    $url    = $_cfg_siteRoot. 'index.php';
    header("Location:". $url);
    exit();
}

$id = intval($_GET['id']);

// db
$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// article
$sql    = ' select
                *
            from
                imgad
            where
                imgad.imgad_id = :id
            ';
$sth    = $dbh->prepare($sql);

$sth->bindValue(':id', $id, PDO::PARAM_INT);
$sth->execute();
$ad_data   = $sth->fetch(PDO::FETCH_ASSOC);

// close DB
$sth    = NULL;
$dbh    = NULL;


$title      = $_cfg_logo_alt. $ad_data['imgad_title'];

include('./tpl/imgad.php');
?>
