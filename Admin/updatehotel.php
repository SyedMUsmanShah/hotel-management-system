<?php
require_once '../sqlfunctions.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $airports = select_all("airports", $connection);
    $services = select_all("services", $connection);
    $features = select_all("features", $connection);
    $hotels = select_where("hotels", "id", $id, $connection, 1);
    $hotelimages = select_where("hotelimages", "hotelid", $id, $connection, 2);
    $hotelservices = select_where("hotelservices", "hotelid", $id, $connection, 2);
    $hotelfeatures = select_where("hotelfeatures", "hotelid", $id, $connection, 2);
    $rates = select_where("rates", "hotelid", $id, $connection, 2);
    $stars = select_where("stars", "hotelid", $id, $connection, 1);
    $seasons = select_all("seasons", $connection);

    if (isset($_POST["submit"])) {
        // hotels table 
        if (!empty($_FILES["logo"]["name"])) {
            unlink("../img/" . $hotels["logo"]);
            $newlogo = $_FILES["logo"]["name"];
            $tmp_image = $_FILES["logo"]["tmp_name"];
            move_uploaded_file($tmp_image, '../img/' . $newlogo);
            $hotel_arr = array(
                "name" => $_POST["name"],
                "logo" => $newlogo,
                "location" => $_POST["location"],
                "distance" => $_POST["distance"],
                "shuttle" => $_POST["shuttle"],
                "airport" => $_POST["airport"],
            );
            $con_arr = array("id" => $id);
            update("hotels", $hotel_arr, $con_arr, $connection);
        } else {
            $logo = $hotels["logo"];
            $hotel_arr = array(
                "name" => $_POST["name"],
                "logo" => $logo,
                "location" => $_POST["location"],
                "distance" => $_POST["distance"],
                "shuttle" => $_POST["shuttle"],
                "airport" => $_POST["airport"],
            );
            $con_arr = array("id" => $id);
            update("hotels", $hotel_arr, $con_arr, $connection);
        }

        // hotel-stars-table 
        $stars = $_POST["stars"];
        $stars_arr = array("stars" => $stars);
        $con_arr = array("hotelid" => $id);
        update("stars", $stars_arr, $con_arr, $connection);


        // hotel-images-table 



        if (!empty($_FILES["multipleimages"]["tmp_name"])) {
            foreach ($hotelimages as $updathotelimages) {
                unlink("../img/" . $updathotelimages["images"]);
            }
            foreach ($_FILES["multipleimages"]["tmp_name"] as $key => $value) {
                $tmp_image = $_FILES["multipleimages"]["tmp_name"][$key];
                $detailimages = $_FILES["multipleimages"]["name"][$key];
                move_uploaded_file($tmp_image, '../img/' . $detailimages);
                $detailimages_arr = array("images" => $detailimages);
                $con_arr = array("hotelid" => $id);
                update("hotelimages", $detailimages_arr, $con_arr, $connection);
            }
        }


        // if (!empty($_FILES["multipleimages"]["tmp_name"])) {
        //     // delete previous images from the file system and database
        //     foreach ($hotelimages as $updathotelimages) {
        //         $image_path = "../img/" . $updathotelimages["images"];
        //         if (file_exists($image_path)) {
        //             unlink($image_path);
        //         }
        //     }
        
        //     // insert new images into the file system and database
        //     foreach ($_FILES["multipleimages"]["tmp_name"] as $key => $value) {
        //         $tmp_image = $_FILES["multipleimages"]["tmp_name"][$key];
        //         $detailimages = $_FILES["multipleimages"]["name"][$key];
        //         $detailimages_arr = array("images" => $detailimages, "hotelid" => $id);
        //         move_uploaded_file($tmp_image, '../img/' . $detailimages);
        //         $con_arr = array("hotelid" => $id);
        //         update("hotelimages", $detailimages_arr, $con_arr, $connection);
        //     }
        // }
        


        // hotel-services-table 

        foreach ($_POST["services"] as $service_key => $service_value) {
            $serv = $_POST["services"]["$service_key"];
            $serv_arr = array("service" => $serv);
            $con_arr = array("hotelid" => $id);
            update("hotelservices", $serv_arr, $con_arr, $connection);
        }

        // hotel-features-table 

        foreach ($_POST["features"] as $features_key => $features_value) {
            $featu = $_POST["features"]["$features_key"];
            $featu_arr = array("feature" => $featu);
            $con_arr = array("hotelid" => $id);
            update("hotelfeatures", $featu_arr, $con_arr, $connection);
        }




        // rates-tabel 
        foreach ($_POST["room"] as $key => $rooms) {
            $rate = $_POST["rate"][$key];
            $no = $_POST["no_of_rooms"][$key];
            $seasons = $_POST["seasons"][$key];
            if ($rooms != "" && $rate != "" && $no !== "" && $seasons !== "") {
                $rate_arr = array("room" => $rooms, "rate" => $rate, "no_of_rooms" => $no, "season" => $seasons);
                $con_arr = array("hotelid" => $id);
                update("rates", $rate_arr, $con_arr, $connection);
            }
        }
        header("location:viewhotel.php");
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once './include/head.php' ?>
    <style>
        .hotel-form {
            background-color: white;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: black;
            border-radius: 25px;
        }

        .form-title {
            color: black;
            font-weight: 900;
        }

        .hotel-form input {
            margin: 10px 0px;
            color: white;
            width: 50%;
        }

        .stars {
            width: 50%;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type=file] {
            color: black;
        }

        .submit {
            width: 50%;
            display: block;
            margin: auto;
        }

        .check-box {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            width: 50%;
            border: 1px solid black;
            margin: 10px 0px;
        }

        .check-box-heading {
            background-color: black;
            margin-right: 20px;
            padding: 10px;
        }

        .check-box input {
            width: 13px;
        }

        .rate-box {
            width: 50%;
        }

        .new-rate-box {
            width: 50%;
        }

        .rates {
            width: 100%;
            border: 1px solid black;
            margin: 10px 0px;
            padding: 5px;
        }

        .new-rates-div {
            width: 100%;
            border: 1px solid black;
            margin: 10px 0px;
            padding: 5px;
        }

        .rates label {
            font-weight: bold;
        }

        .rates input {
            width: 90%;
            margin: 5px auto;
        }

        .new-rates-div input {
            width: 90%;
            margin: 5px auto;
        }

        .add {
            width: 100%;
        }

        .Plus {
            float: right;
            border: none;
        }

        .minus {
            float: right;
            border: none;
        }

        .airport {
            width: 50%;
            margin-bottom: 20px;
        }

        .airport label {
            font-weight: bold;
        }

        .airport input {
            width: 90%;
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


        <?php require_once './include/sidebar.php' ?>


        <!-- Content Start -->
        <div class="content">

            <?php require_once './include/navbar.php' ?>



            <form action="" method="post" class="hotel-form" enctype="multipart/form-data">
                <h1 class="form-title">Add Your Hotel</h1>
                <input type="text" class="form-control" name="name" placeholder="Enter Hotel Name" value="<?php echo $hotels["name"] ?>">
                <div class="form-group stars">
                    <label for="my-select">Select Stars</label>
                    <select id="my-select" class="form-control" name="stars">
                        <option value="<?php echo $stars["stars"] ?>" selected><?php echo $stars["stars"] . '_star' ?></option>
                        <option value="1">1_star</option>
                        <option value="2">2_star</option>
                        <option value="3">3_star</option>
                        <option value="4">4_star</option>
                        <option value="5">5_star</option>
                    </select>
                </div>
                <label for="">Upload Logo</label><input class="form-control" type="file" name="logo">
                <label for="">Upload Hotel Images</label><input class="form-control" type="file" name="multipleimages[]" multiple>
                <input type="text" class="form-control" name="location" placeholder="Enter Hotel location" value="<?php echo $hotels["location"] ?>">
                <input type="text" class="form-control" name="distance" placeholder="Enter distance from Airport" value="<?php echo $hotels["distance"] ?>">
                <input type="text" class="form-control" name="shuttle" placeholder="Enter shuttle hours" value="<?php echo $hotels["shuttle"] ?>">
                <div class="check-box">
                    <h6 class="check-box-heading">services:</h6>
                    <?php if (!empty($services)) { ?>
                        <?php foreach ($services as $main) { ?>

                            <label for=""><?php echo $main["serviceName"] ?>:</label><input type="checkbox" name="services[]" class="form-check-input" id="" value="<?php echo $main["serviceName"] ?>"> &nbsp;&nbsp;&nbsp;

                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="check-box">
                    <h6 class="check-box-heading">Features:</h6>
                    <?php if (!empty($features)) { ?>
                        <?php foreach ($features as $main) { ?>

                            <label for=""><?php echo $main["feature"] ?>:</label><input type="checkbox" name="features[]" class="form-check-input" id="" value="<?php echo $main["feature"] ?>"> &nbsp;&nbsp;&nbsp;

                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="rate-box">
                    <div class="add">
                        <span>Rates</span><button type="button" class="Plus">+</button>
                    </div>
                    <?php foreach ($rates as $mainRates) { ?>
                        <div class="rates">
                            <label for="">Accomodation</label><input type="text" name="room[]" id="" class="form-control room" placeholder="Type of Room" value="<?php echo $mainRates["room"] ?>">
                            <label for="">Price</label><input type="text" name="rate[]" id="" class="form-control rate" placeholder="Rate" value="<?php echo $mainRates["rate"] ?>">
                            <div class="form-group">
                                <label for="seasons">Select Season</label>
                                <select id="seasons" class="form-control" name="seasons[]">
                                    <?php if (!empty($seasons)) { ?>
                                        <option value="<?php echo $mainRates["season"] ?>" selected><?php echo $mainRates["season"] ?></option>
                                        <?php foreach ($seasons as $mainSeasons) { ?>
                                            <option value="<?php echo $mainSeasons["name"] ?>"><?php echo $mainSeasons["name"] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="no-of-rooms">No. of Rooms</label><input type="text" name="no_of_rooms[]" id="no-of-rooms" class="form-control room" placeholder="No of Room" value="<?php echo $mainRates["no_of_rooms"] ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="rate-box" style="display: none;">
                    <div class="new-rates">
                        <div class="new-rates-div">
                            <button type="button" class="minus">-</button>
                            <label for="">Accomodation</label><input type="text" name="room[]" id="" class="form-control room" placeholder="Type of Room">
                            <label for="">Price</label><input type="text" name="rate[]" id="" class="form-control rate" placeholder="Rate">
                            <div class="form-group">
                                <label for="seasons">Select Season</label>
                                <select id="seasons" class="form-control" name="seasons[]">
                                    <?php if (!empty($seasons)) { ?>
                                        <option value="<?php echo $mainRates["season"] ?>" selected><?php echo $mainRates["season"] ?></option>
                                        <?php foreach ($seasons as $mainSeasons) { ?>
                                            <option value="<?php echo $mainSeasons["name"] ?>"><?php echo $mainSeasons["name"] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="no-of-rooms">No. of Rooms</label><input type="text" name="no_of_rooms[]" id="no-of-rooms" class="form-control room" placeholder="No of Room" value="<?php echo $mainRates["no_of_rooms"] ?>">
                        </div>
                    </div>
                </div>
                <div class="new-rate-box">

                </div>


                <div class="airport">
                    <div class="form-group">
                        <label for="Airport">Select Airport</label>
                        <select id="Airport" class="form-control" name="airport">
                            <?php if (!empty($airports)) { ?>
                                <?php foreach ($airports as $mainAirports) { ?>
                                    <option value="<?php echo $mainAirports["Airport"] ?>"><?php echo $mainAirports["Airport"] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit" name="submit">Update</button>
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
    <script>
        $(document).ready(function() {

            $(".Plus").click(function() {
                $(".new-rates").children().clone(true, true).appendTo(".new-rate-box");
            });
            $(".minus").click(function() {
                console.log("Hello world!");
                $(this).parent().remove();
            })
        });
    </script>
</body>

</html>