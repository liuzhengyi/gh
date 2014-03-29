<?php
/**
 * index of admin module of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-22
 *
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);
$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

$action     = empty($_GET['act']) ? trim($_GET['act']) : '' ;

if ( 'edit' === $action ) {
    $id = empty($_GET['id']) ? intval($_GET['id']) : 0;
    if ( empty($id) ) {
        exit('未指定ID');
    }

    $sql        = 'select * from ad where ad_id = :id';
    $sth        = $dbh->prepare($sql);
    $sth->bindValue(':id', $id);
    $sth->execute();
    $adver_data = $sth->fetch(PDO::FETCH_ASSOC);

    var_dump($adver_data);

    include('./tpl/action/edit_adver.php');
}

?>
