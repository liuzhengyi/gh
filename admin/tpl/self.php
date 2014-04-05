<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
    <h2>用户信息管理-修改密码</h2>

    <form method="POST" action="<?php echo $_cfg_siteRootAdmin. 'action/edit_user_do.php'; ?>">
        用户名： <input type="text" name="user_name" value="<?php echo $data['user_name'];?>" readonly="true" />
        <br /> <br />
        密码： <input type="password" name="password0" value="" />
        <br /> <br />
        重复密码： <input type="password" name="password1" value="" />
        <br /> <br />
        <input type="submit" name="submit" value="修改信息" />
    </form>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>
