<?php

include_once ROOT . '/model/login.php';
include_once ROOT . '/model/comment.php';

Class IndexController
{


public function actionIndex(){

        $login = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
        unset($password);
        exit ("Введите пароль");
    }
}
            $password = trim($password);
            $password = stripslashes($password);
            $password = htmlspecialchars($password);
            $password = md5(md5(($password)));
            $errors = false;



            if (!login::checkLogin($login)) {
                $errors[] = 'Неправильный логин';
            }
            if (!login::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }


            $userId = login::checkUserData($login, $password);

            if ($userId == false) {

                $errors[] = 'Неправильные данные для входа на сайт';
            } else {

                login::auth($userId);
                $_SESSION['login'] = $login;




            }

        }
        
        
        
        $name = '';
        $text = '';
        $parent_id = '';
                $result = false;
        
                if (isset($_POST['comment_add'])) {
                    $name = $_POST['name'];
        $parent_id = $_POST['parent_id'];
                    if (isset($_POST['text'])) {
            $text=$_POST['text'];
            if ($text =='') {
                unset($text);
                exit ("Введите комментарий");
            }
        }
        $result = comment::addComment($name, $text, $parent_id);

                        header("Location:/");
                        }
        
        $userId = login::checkLogged();


         $user = login::getUserById($userId);

        $comment = array();
        $comment = comment::commentExist();

 require_once(ROOT. '/view/index.php');

return true;
}

public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }

}