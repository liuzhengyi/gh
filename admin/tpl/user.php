<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container" class="row marketing">

    <h2>用户管理</h2>
    <p><a href="<?php echo $add_url; ?>" class="btn" >添加用户</a></p>
    <table id="user-manage" border="1" >
        <thead>
            <tr>
                <th id="">ID</th>
                <th id="">用户名</th>
                <th id="">超级管理员</th>
                <th id="">最后登录时间</th>
                <th id="">最后登录IP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ( $user_data as $user ) {
                $is_super = empty( $user['is_admin'] ) ? '否' : '是';
                echo '<tr>';
                echo '<td>'. $user['user_id']. '</td>';
                echo '<td>'. $user['user_name']. '</td>';
                echo '<td>'. $is_super. '</td>';
                echo '<td>'. $user['last_login']. '</td>';
                echo '<td>'. $user['last_ip']. '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>
