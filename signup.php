<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ro'yxatdan o'tish</title>
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
                        if (isset($_POST['signUp'])) {
                            $fname = $_POST["fname"];
                            $lname = $_POST["lname"];
                            $email = $_POST["email"];
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
                            
                            $errors = array();
                            
                            if(strlen($fname)<=3){
                                array_push($errors, "Ism 3 ta belgi va undan uzun bo'lishi kerak!");
                            }
                            if(strlen($lname)<=3){
                                array_push($errors, "Familiya 3 ta belgi va undan uzun bo'lishi kerak!");
                            }
                            if(strlen($email)<6){
                                array_push($errors,"Email noto'g'ri kiritilgan. gmail yoki mail bo'lishi kerak");
                            }
                            if(strlen($password)<5){
                                array_push($errors,"Parol 5 ta belfidan uzun bo'lishi kerak");
                            }
                            // Databaseda takrorlanmasligini tekshiramiz.
                            require_once "./config.php";
                            $sql = "SELECT * FROM users WHERE email = '$email'";
                            $result = mysqli_query($conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            if ($rowCount>0) {
                                array_push($errors,"Email  allaqachon ishlatilgan");
                            }
                            $sql = "SELECT * FROM users WHERE  username = '$username'";
                            $result = mysqli_query($conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            if ($rowCount>0) {
                                array_push($errors,"Username  allaqachon ishlatilgan");
                            }
                            // xatolarni tekshiramiz.
                            if(count($errors)>0){
                                foreach ($errors as $error) {
                                    echo "<div class='alert alert-danger'>$error</div>";
                                }
                            }else{
                                // Agar hamma ma'lumotlar to'g'ri kiritilsa
                                $sql = "INSERT INTO users (fname,lname,username,email,password) VALUES('$fname','$lname','$username','$email','$passwordHash') ";
                                
                                if (mysqli_query($conn, $sql)) {
                                    echo "<div class='alert alert-success'>Ro'yxatdan o'tdingiz<br><a href='./login.php'>tizimga kiring</a></div>";
                               } else {
                                    die("Xatolik: " . $sql . "<br>" . mysqli_error($conn));
                               }
                               mysqli_close($conn);

                            }
        
                        }
                        ?>
                </div>
                <div class="col-sm-6 pt-5">
                    <form action="" method="post" class="mt-5 mx-3 shadow p-4 mb-5 bg-body rounded">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center mb-3 fw-semibold">Ro'yxatdan o'tish</h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingfname" placeholder="Anodra" name="fname">
                                    <label for="floatingfname">Ism</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatinglname" placeholder="Anodra" name="lname">
                                    <label for="floatinglname">Familiya</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                    <label for="floatingInput">Elektron pochta</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatinguname" placeholder="username" name="username">
                                    <label for="floatinguname">Username</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                    <label for="floatingPassword">Parol</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="submit" value="Ro'yxatdan o'tish" class="btn btn-primary px-4 form-control fw-semibold" name="signUp">
                                </div>
                                <p class="text-center">
                                    Hisobingiz bormi? <a href="./login.php">Tizimga kirish</a>
                                </p>
                            </div>
                        </div>
                        
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