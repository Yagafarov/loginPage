<?php
include('./config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="h-100">

    <!-- ########################## -->
    <section>
        <div class="container-sm">
            
            <div class="row ">
                <div class="col-sm-3 mt-5">
                <?php
                if (isset($_POST["signIn"])) {
                    $login = $_POST["login"];
                    $password = $_POST["password"];
                    require_once "./config.php";
                    $sql = "SELECT * FROM users WHERE email = '$login' OR username = '$login'";
                    $result = mysqli_query($conn,$sql);
                    $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    if ($user) {
                        if(password_verify($password,$user["password"])){
                            session_start();
                            $_SESSION["user"] = "yes";
                            header("Location: create.php");
                            die();
                        }else{
                            echo "<div class='alert alert-danger'>Parol noto'g'ri</div>";
                        }
                    }else{
                        echo "<div class='alert alert-danger'>Bunday foydalanuvchi tizimga mavjud emas<br><a href='./signup.php'>ro'yxatdan o'ting</a></div>";
                    }
                }
            ?>
                </div>
                <div class="col-sm-6">
                    <form action="" method="post" class="form mx-3 shadow p-4 mb-5 bg-body rounded">
                        <h3 class="text-center mb-3 fw-semibold">Tizimga kirish</h3>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="login">
                            <label for="floatingInput">elektron pochta yoki username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Parol</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                yodda tutish
                            </label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="KIRISH" class="btn btn-primary px-4 form-control fw-semibold" name="signIn">
                        </div>
                        <p class="text-center" >
                            <a href="#" class=" ">Parolni unutdingizmi?</a>
                        </p>
                        <p class="text-center">
                            Hisobingiz yo'qmi? <a href="./signup.php">Ro'yxatdan o'tish</a>
                        </p>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section>
    <!-- ########################## -->

    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>