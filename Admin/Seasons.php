<?php
require_once '../connection.php';

if(isset($_POST["submit"])){
    $Season = $_POST["season"];
    $Season_start = $_POST["startDate"];
    $Season_end = $_POST["endDate"];
    

    $sql = "INSERT INTO seasons (name,start,end) VALUE ('$Season','$Season_start','$Season_end')";
    mysqli_query($connection,$sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once './include/head.php' ?>
    <style>
        .season-form{
            display: flex;
            flex-direction: column;
            width: 50%;
            background-color: white;
            margin: 100px auto;
            padding: 50px;
            border-radius: 40px;
        }
        .season-form input{
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
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <?php  require_once './include/sidebar.php' ?>


        <!-- Content Start -->
        <div class="content">
           
        <?php  require_once './include/navbar.php' ?>

           

        <form action="" method="post" class="season-form">
           
                <h1 class="title">ADD Seasons</h1>
                <label for="season" class="title">Season</label>
                <input class="form-control" type="text" name="season" id="season">
                <label for="start" class="title">Season Start</label>
                <input class="form-control" type="date" name="startDate" id="start">
                <label for="end" class="title">Season End</label>
                <input class="form-control" type="date" name="endDate" id="end">
                <button class="btn btn-primary submit" type="submit" name="submit">Submit</button>
        </form>
            
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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