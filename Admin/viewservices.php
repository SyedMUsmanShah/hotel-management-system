<?php
require_once '../connection.php';
$sql = "SELECT * FROM services";
$res = mysqli_query($connection, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Airport</title>
    <?php require_once './include/head.php' ?>
</head>

<body>
    <?php require_once './include/sidebar.php' ?>
    <div class="content">
        <?php require_once './include/navbar.php' ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ICON</th>
                    <th>Services</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $main) { ?>
                    <tr>
                        <td>
                            <?php echo $main["id"] ?>
                        </td>
                        <td>
                            <i class="<?php echo $main["faIcon"] ?>"></i>
                        </td>
                        <td>
                            <?php echo $main["serviceName"] ?>
                        </td>
                        <td>
                            <a href="deleteservice.php?id=<?php echo $main["id"] ?>" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="editservice.php?id=<?php echo $main["id"] ?>" class="btn btn-success">Update</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


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