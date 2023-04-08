<?php
    require './config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboart</title>
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>

    <!-- ########################## -->
   <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Umumiy ma'lumot
                            <a href="./create.php" class="btn btn-primary float-end">Qo'shish</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class='text-center'>
                                    <th>ID</th>
                                    <th>Rasm</th>
                                    <th>Ism</th>
                                    <th>Familiya</th>
                                    <th>Pasport</th>
                                    <th>Jshshr</th>
                                    <th>Telefon</th>
                                    <th>Boshqaruv</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM dataUser";
                                    $query_run = mysqli_query($conn,$query);

                                    if(mysqli_num_rows($query_run)>0){
                                        foreach($query_run as $us){
                                            ?>
                                            <tr>
                                                <td class='text-center'><?= $us['user_id'];?></td>
                                                <td>rasm</td>
                                                <td><?= $us['fname'];?></td>
                                                <td><?= $us['lname'];?></td>
                                                <td><?= $us['pasport'];?></td>
                                                <td><?= $us['jshshr'];?></td>
                                                <td><?= $us['telnum'];?></td>
                                                <!-- <td><?= $us['descRip'];?></td> -->
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ko'rish</a>
                                                    <a href="dataEdit.php?id=<?= $us['user_id']; ?>" class="btn btn-success btn-sm">Tahrirlash</a>
                                                    <a href="#" class="btn btn-danger btn-sm">O'chirish</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        echo "<h5>Ma'lumot mabjud emas</h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>
    <!-- ########################## -->

    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>
