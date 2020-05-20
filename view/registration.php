



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Гостевая книга</title>
<link rel="stylesheet" href= "/Templates/css/main.css"></link>
<link rel="stylesheet" href="/Templates/css/bootstrap.css"></link>
<link rel="stylesheet" href="/Templates/css/bootstrap-grid.css"></link>
<link rel="stylesheet" href="/Templates/css/bootstrap-reboot.css"></link>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></link>

<script rel="javascript" href= Root. "/Templates/js/bootstrap.js" ></script>
<script rel="javascript" href=Root. "/Templates/js/bootstrap.bundle.js" ></script>

</head>
<body>
<div class="container ">

<div class="head">
<h2 class="text-center">Регистрация</h2>
             <?php if ($result): ?>
                    <p class="text-center">Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
<div class="Login row justify-content-center ">
<form action="#" method="post"  class="text-center col-4 ">
  <div class="form-group" >
    <label for="exampleInputLogin">Логин</label>
    <input type="login" name="login" class="form-control" id="exampleInputLogin" aria-describedby="loginHelp" placeholder="Введите логин">
    <small id="loginHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Введите пароль</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Пароль">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Зарегестрироваться</button>

</form>

<?php endif; ?>
</div>
</div>



</body>
</HTML>



