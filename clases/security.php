<?php
/* hecho por tino */
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
            $_SESSION["loggedIn"] = $this->checkUser($user, $_POST["password"]) ? $user[0]["userName"] : false;
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
        }else{
            return false;
        }
    }

    public function isAdmin($userName)
    {
        $data = $this->getUser($userName);

        return ($data[0]["moderador"] == 1) ? true : false;
    }


    private function checkUser($user, $userPassword)
    {
        if ($user) {    
            return $this->checkPassword($user[0]["password"], $userPassword);
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
        $sql = "SELECT * FROM usuario WHERE userName = '$userName'";
        $result = $this->conn->query($sql);
        if ($result->rowCount() > 0) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function register()
    {
        if (count($_POST) > 0) {
            if ($_POST["password"] == $_POST["password2"]) {
                try {
                $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
                $name = $_POST["name"];
                $fecha = date("j M Y");
                $email = $_POST["email"];
                $sql = "INSERT INTO usuario(userName, moderador, fecha_creacion, email, password) VALUES ('$name',0,'$fecha','$email','$password')";
                $this->conn->query($sql);
                header("Location: " . $this->loginPage);
                } catch (PDOException $e) {
                    echo "Este usuario ya existe";
                }

            }else{
                $str = "las contraseñas no coinciden";
                return  $str;
            }

        }
    }
}
