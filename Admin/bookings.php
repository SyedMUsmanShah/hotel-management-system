<?php

require_once '../sqlfunctions.php';

$booking = "SELECT * FROM guest INNER JOIN payment ON guest.id = payment.guest_id";
$booking_res = mysqli_query($connection, $booking);
if (mysqli_num_rows($booking_res) > 0) {
    while ($row = mysqli_fetch_assoc($booking_res)) {
        $booking_data[] = $row;
    }
}

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
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Ph#</th>
                            <th>check in/out</th>
                            <th>veh pickup</th>
                            <th>No of Rooms</th>
                            <th>Room</th>
                            <th>Dues</th>
                            <th>Card Name</th>
                            <th>Card Number</th>
                            <th>EXP</th>
                            <th>CVC</th>
                            <th>Address</th>
                            <th>ZIP</th>
                            <th>Date</th>
                            <th>Del Booking</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($booking_data)) {
                            foreach ($booking_data as $booking_main) {
                        ?>
                                <tr>
                                    <td><?php echo $booking_main["id"] ?></td>
                                    <td><?php echo $booking_main["f_name"] ?></td>
                                    <td><?php echo $booking_main["l_name"] ?></td>
                                    <td><?php echo $booking_main["email"] ?></td>
                                    <td><?php echo $booking_main["number"] ?></td>
                                    <td><?php echo $booking_main["check_in"] . ' / ' . $booking_main["check_out"] ?></td>
                                    <td><?php echo $booking_main["car_pickup"] ?></td>
                                    <td><?php echo $booking_main["rooms"] ?></td>
                                    <td><?php echo $booking_main["room_type"] ?></td>
                                    <td><?php echo $booking_main["rate"] ?></td>    
                                    <td><?php echo $booking_main["c_name"] ?></td>    
                                    <td><?php echo $booking_main["c_number"] ?></td>    
                                    <td><?php echo $booking_main["exp"] ?></td>    
                                    <td><?php echo $booking_main["cvc"] ?></td>    
                                    <td><?php echo $booking_main["address"] ?></td>    
                                    <td><?php echo $booking_main["zip"] ?></td>    
                                    <td><?php echo $booking_main["date"] ?></td>    
                                    <td><a href="delbooking.php?id=<?php echo $booking_main["id"] ?>" class="btn btn-danger">Delete</a></td>    
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>


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