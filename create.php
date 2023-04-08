
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create user</title>
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>

    <!-- ########################## -->
    <div class="container mt-4">
        <div class="row">
        <?php
    if (isset($_POST["add-data"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $telnum = $_POST["telnum"];
        $pasnum = $_POST["pasnum"];
        $jshshr = $_POST["jshshr"];
        $jshshr = $_POST["jshshr"];
        $imgfile = $_POST["imgfile"];
        $textarea = $_POST["textarea"];

        $errors = array();
                    
                    if(strlen($fname)<=3){
                        array_push($errors, "Ism 3 ta belgi va undan uzun bo'lishi kerak!");
                    }
                    if(strlen($lname)<=3){
                        array_push($errors, "Familiya 3 ta belgi va undan uzun bo'lishi kerak!");
                    }
                    if(strlen($telnum)!== 9){ 
                        array_push($errors, "Telefon raqam noto'g'ri!");
                    }
                    if(strlen($pasnum) != 9){
                        array_push($errors,"Pasport seriya raqami noto'g'ri");
                    }
                    if(strlen($jshshr)!=14){
                        array_push($errors,"JSHSHR 14 ta belgidan iborat bo'lishi kerak");
                    }
                    // xatolarni tekshiramiz.
                    if(count($errors)>0){
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    }else{
                        require_once './config.php';
                        $sql = "INSERT INTO dataUser(fname,lname,pasport,jshshr,telnum,descRip,img_url) VALUES('$fname','$lname','$pasnum','$jshshr','$telnum','$textarea','$imgfile')";
                        if (mysqli_query($conn, $sql)) {
                            echo "<div class='alert alert-success'>Ma'lumot qo'shildi</div>";
                       } else {
                            die("Xatolik: " . $sql . "<br>" . mysqli_error($conn));
                       }
                       mysqli_close($conn);
                    }
    }
    
    ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ma'lumot qo'shish<a href="index.php" class="btn btn-danger float-end">Chiqish</a></h5>
                    </div>
                    <div class="card-body">
                        <form action="create.php" method="post">
                            <div class="row px-sm-5">
                                <div class="col-md-4 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="fname" placeholder="Ism" id="fname">
                                        <label for="fname">Ism</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="lname" placeholder="Famliya" id="lname">
                                        <label for="lname">Familiya</label>
                                    </div>
                                </div>
                                <div class="col-md-4  mb-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" placeholder="Telefon raqam" name="telnum" id="telnum" >
                                        <label for="telnum">Telefon raqam (998xx xxx xx xx)</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6  mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Pasport num" name="pasnum" id="pasnum" >
                                        <label for="pasnum">Pasport seriya, raqami (YYxxxxxxx)</label>
                                    </div>
                                </div>
                                <div class="col-md-6  mb-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" placeholder="jshshr" name="jshshr" id="jshshr" >
                                        <label for="jshshr">Jshshr (14 ta belgi)</label>
                                    </div>
                                </div>
                                <div class="col-md-3  p-4 shadow border rounded mb-3">
                                    <figure class="image-container text-center">
                                        <img id="choose-image" src="assets/images/default-user-image.png" alt="img" class=" shadow img-fluid border border-primary figure-img rounded" style="max-width:100%;height:150px;margin:auto;object-fit:cover; ">
                                        <figcaption id="file-name" class="my-2 figure-caption text-truncate">
                                        </figcaption>
                                        <input type="file" name="imgfile" id="upload-button" accept="image/*" style="display:none;">
                                        <label for="upload-button" class="btn btn-primary btn-sm">
                                            Rasm tanlang
                                        </label>
                                    </figure>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="form-floating shadow">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height:255px" name="textarea"></textarea>
                                        <label for="floatingTextarea">Qo'shimcha</label>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-light p-3 rounded shadow">
                                <a href="#" class="btn btn-outline-primary">Tekshirish</a>
                                <button type="submit" class="btn btn-primary float-end" name="add-data">Qo'shish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ########################## -->

    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        let uploadButton = document.getElementById("upload-button");
        let chooseImage = document.getElementById("choose-image");
        let fileName = document.getElementById("file-name");

        uploadButton.onchange = () =>{
            let reader = new FileReader();
            reader.readAsDataURL(uploadButton.files[0]);
            reader.onload = ()=>{
                chooseImage.setAttribute("src",reader.result);
            }
            fileName.textContent = uploadButton.files[0].name;
        }
    </script>
</body>

</html>