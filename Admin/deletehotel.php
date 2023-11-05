<?php
require_once '../sqlfunctions.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $hotels = select_where("hotels","id", $id, $connection, 1);
    $images = select_where("hotelimages", "hotelid", $id, $connection, 2);
    unlink("../img/" . $hotels["logo"]);
    foreach($images as $mainImages){
        unlink("../img/" . $mainImages["images"]);
    }

    $deletehotel = delete_where_fun("hotels", "id", $id, $connection);
    $deleteServices = delete_where_fun("hotelservices", "hotelid", $id, $connection);
    $deleteFeatures = delete_where_fun("hotelfeatures", "hotelid", $id, $connection);
    $deleteStars = delete_where_fun("stars", "hotelid", $id, $connection);
    $deleteRate = delete_where_fun("rates", "hotelid", $id, $connection);
    $deleteImages = delete_where_fun("hotelimages", "hotelid", $id, $connection);

    header('location:viewhotel.php');

}

?>