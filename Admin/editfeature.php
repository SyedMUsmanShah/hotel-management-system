<?php

require_once '../connection.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM features WHERE id = '$id'";

    $res = mysqli_query($connection, $sql);

    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_array($res)){
            $data[] = $row;
        }
    }

if(isset($_POST["submit"])){
    $Features = $_POST["Features"];
    $icon = $_POST["icon"];

    $insert = "UPDATE features SET feature = '$Features', faIcon = '$icon' WHERE id=$id";
    mysqli_query($connection, $insert);
    header("location:viewfeatures.php");

}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once './include/head.php' ?>
    <style>
        .services-form{
            display: flex;
            flex-direction: column;
            width: 50%;
            background-color: white;
            margin: 100px auto;
            padding: 50px;
            border-radius: 40px;
        }
        .services-form input{
            margin: 10px 0px;
            color: white;
        }
        .title{
            color: black;
        }
        .submit{
            width: 50%;
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
    
    <?php require_once './include/sidebar.php' ?>
    <div class="content">
        <?php require_once './include/navbar.php' ?>
    <div class="container">
    
    <form action="" method="post" class="services-form">
           
                <h1 class="title">ADD Features</h1>
                <?php foreach($data as $main){ ?>
                <input id="" class="form-control" type="text" name="Features" placeholder="Enter your Features" value="<?php echo $main["feature"] ?>">
                <input id="" class="form-control" type="text" name="icon" placeholder="Enter fa icon name" value="<?php echo $main["faIcon"] ?>">
                <?php } ?>
                <button class="btn btn-primary submit" type="submit" name="submit">Submit</button>
        </form>

    </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>