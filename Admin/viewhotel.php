<?php

require_once '../sqlfunctions.php';

$hotel = select_all("hotels", $connection);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './include/head.php' ?>

</head>

<body>

    <?php require_once './include/sidebar.php' ?>
    <div class="content">
        <?php require_once './include/navbar.php' ?>
        <div class="container">
            
                    <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Airport</th>
                                    <th>logo</th>
                                    <th>del/upd</th>
                                </tr>
                            </thead>
                            
                        <tbody>
                                <?php if(!empty($hotel)){
                                    foreach($hotel as $mainHotel){
                                         ?>
                            <tr>
                                <td><?php echo $mainHotel["id"] ?></td>
                                <td><?php echo $mainHotel["name"] ?></td>
                                <td><?php echo $mainHotel["location"] ?></td>
                                <td><?php echo $mainHotel["airport"] ?></td>
                                <td><img src="../img/<?php echo $mainHotel["logo"] ?>" alt="" srcset="" height="100px"></td>
                                <td><a href="deletehotel.php?id=<?php echo $mainHotel["id"] ?>" class="btn btn-danger">Delete</a><a href="updatehotel.php?id=<?php echo $mainHotel["id"] ?>" class="btn btn-success mt-2">Update</a></td>
                            </tr>
                                <?php }
                                } ?>
                        </tbody>
                    </table>
                


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