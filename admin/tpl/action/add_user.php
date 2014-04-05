<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>用户管理-添加用户</h2>
<form action="./action/add_user_do.php" METHOD="POST" role="form" class="">

    <span class="form-field-name">用户名:</span><input type="text" name="user_name" /> <br />
    <span class="form-field-name">初始密码:</span><input type="text" name="password" /> <br />
    <span class="form-field-name">超级管理员:</span>
    <select name="is_admin" >
        <option value='0'>否</option>
        <option value='1'>是</option>
    </select><br />
    <span class="form-field-name"></span><input type="submit" name="submit" value="添加" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>
