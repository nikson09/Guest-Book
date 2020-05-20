<?php
        $paramsPath = ROOT . '/config/connect.php';
        $params = include($paramsPath);

$mysqli = comment::db_connect($params['host'], $params['user'], $params['password'], $params['dbname']);
$cats = comment::getCategories($mysqli);

$cats = comment::createTree($cats);



?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Гостевая книга</title>
<link rel="stylesheet" href= "/Templates/css/main.css"></link>
<link rel="stylesheet" href="/Templates/css/bootstrap.css"></link>
<link rel="stylesheet" href="/Templates/css/bootstrap-grid.css"></link>
<link rel="stylesheet" href="/Templates/css/bootstrap-reboot.css"></link>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></link>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script rel="javascript" href= Root. "/Templates/js/bootstrap.js" ></script>
<script rel="javascript" href=Root. "/Templates/js/bootstrap.bundle.js" ></script>
<script type="text/javascript">
		$(document).ready(function () {

			$("a.reaply").click(function () {
				var id = $(this).attr("id");
				$("#parent_id").attr("value",id);
			});

		});
	</script>

</head>
<body>

<div class="container ">

<div class="head">
<h2 class="text-center"><i class="fa fa-address-book"></i>Гостевая книга</h2>




</div>
<?php if (login::isGuest()): ?>
<?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

<h6 class="text-center">(Для написания комментария введите ваши данные в форму)</h6>
<div class="Login row justify-content-center ">

<form action="#" method="post"  class="text-center col-4 ">
  <div class="form-group" >
    <label for="exampleInputLogin">Логин</label>
    <input type="login" name="login" class="form-control" id="exampleInputLogin" aria-describedby="loginHelp" placeholder="Введите логин">
    <small id="loginHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Введите пароль</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Войти</button>
  <a class="btn btn-primary" href="registration">Регистрация</a>
</form>
</div>
<?php else: ?>
<div class="CommentForm  ">
<form action="#" method="post" class="">

  <div class="form-group ">

    <label  for="exampleFormControlTextarea1"> <?php echo  $user['login']; ?></label>
    <input type="hidden" name="name"  value="<?php echo  $user['login']; ?>"/>
    <a href="/Logout">выйти</a>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите ваш комментарий"></textarea>
  </div>
  <div class="butter">
  <input type="hidden" name="parent_id" id="parent_id" value="0"/>
  <button type="submit" name="comment_add" class="btn btn-primary ">Отправить</button>
  </div>
</form>
</div>

 <?php endif; ?>

<div class="comments">
<h3 class="title-comments">Комментарии</h3>

<ul class="media-list"><?php echo comment::renderTemplate(ROOT. '/view/Templates/Comment_template.php',['cats'=>$cats]); ?></ul>












</div>

</div>


</body>
</html>