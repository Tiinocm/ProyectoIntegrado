<?php

class security extends connection
{
    private $loginPage = "login.php";
    private $homePage = "index.php";

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function checkLoggedIn()
    {
        if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
            header("Location: " . $this->loginPage);
        }
    }

    public function doLogin()
    {
        if (count($_POST) > 0) {
            $user = $this->getUser($_POST["userName"]);
            $_SESSION["loggedIn"] = $this->checkUser($user, $_POST["userPassword"]) ? $user["userName"] : false;
            if ($_SESSION["loggedIn"]) {
                header("Location: " . $this->homePage);
            } else {
                return "Incorrect User Name or Password";
            }
        } else {
            return null;
        }
    }

    public function getUserData()
    {
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
            return $_SESSION["loggedIn"];
        }
    }

    private function checkUser($user, $userPassword)
    {
        if ($user) {
            return $this->checkPassword($user["password"], $userPassword);
        } else {
            return false;
        }
    }

    private function checkPassword($securePassword, $userPassword)
    {
        return password_verify($userPassword, $securePassword);
    }

    private function getUser($userName)
    {
        $sql = "SELECT * FROM users WHERE userName = '$userName'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function register()
    {
        if ($_POST > 0) {
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $sql = "INSERT INTO usuario(userName, moderador, fecha_creacion, email, password) VALUES ('','[value-2]','[value-3]','[value-4]','[value-5]')";
        }
    }
}
