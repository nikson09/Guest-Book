<?php
include_once ROOT . '/model/login.php';

class RegistrationController
{

public function actionRegistration() {

        $login = '';

        $password = '';

        $result = false;

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
                $errors[] = 'Логин не должен быть короче 2-х символов';
            }
            if (!login::checkLoginText($login)) {
                $errors[] = "Логин может состоять только из букв английского алфавита и цифр";
            }




            if (!login::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

if (login::checkLoginExists($login)) {
                $errors[] = 'Такой логин уже используется';
            }


            if ($errors == false) {
                $result = login::register($login, $password);

                header("Location:/");
            }

}
require_once(ROOT. '/view/registration.php');

return true;

}








}