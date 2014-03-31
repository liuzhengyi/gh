
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <title>平安好房-管理后台</title>
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <script src="./js/jquery-1.8.1.min.js" type="text/javascript"></script>
    <script src="./js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="<?php echo $_cfg_siteRootAdmin;?>action/login.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="name" class="form-control" placeholder="登录名" required autofocus>
        <input type="password" name="pwd" class="form-control" placeholder="密码" required>
        <br />
        <button class="btn btn-lg btn-primary " type="submit" name="submit" value="signin" >Sign in</button>
      </form>

    </div> <!-- /container -->


  </body>
</html>

