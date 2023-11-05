<?php

require_once '../connection.php';

if(isset($_POST["submit"])){
    $airports = $_POST["airports"];

    $insert = "INSERT INTO airports (Airport) VALUE ('$airports')";
    mysqli_query($connection, $insert);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once './include/head.php' ?>
    <style>
        .container{
            background-image: url(./design/shutterstock_758602234-min-1038x778.webp);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 200px;
            height: 90vh;
        }
        .btn-primary{
            width: 50%;
            font-size: 26px;
            font-style: italic;
            font-family: 'sans-serif';
            margin: 20px auto;
        }
        .airports{
            width: 60%;
            margin: 30px 190px;
            padding: 25px;
            text-align: center;
            background-color: black;
            color: white;
        }
        .submit{
            width: 30%;
            margin: auto;
        }
    </style>
</head>
<body>
    
    <?php require_once './include/sidebar.php' ?>
    <div class="content">
        <?php require_once './include/navbar.php' ?>
    <div class="container">
    <form action="" method="post">
        <h1 class="btn btn-primary d-block">Add Airports</h1>
        <input type="text" name="airports" id="" class="airports" placeholder="add Airport name">
        <button type="submit" class="btn d-block btn-secondary submit" name="submit">ADD</button>
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