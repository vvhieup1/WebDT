<?php

class Controller_Login extends Controller
{


    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function action_index()
    {

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];


            if ($this->model->authenticate($login, $password)) {
                $user = $this->model->infoByLogin($login);
                $data["login_status"] = "access_granted";
                $_SESSION["logged_in"] = true;
                $_SESSION["login"] = $login;
                $_SESSION["role"] = $user['role'];
                $_SESSION["name"] = $user['name'];
                $_SESSION["user_id"] = $user["user_id"];
                header('Location:/profile/');
            } else {
                $data["login_status"] = "access_denied";
            }
        } else {
            $data["login_status"] = "";

        }


        $this->view->generate('login_view.php', 'template_view.php', $data);
    }

}