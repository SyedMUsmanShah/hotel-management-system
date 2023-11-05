<?php

if (isset($_POST["submit"])) {
    $stars = $_POST["stars"];
    echo $stars;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayParkTravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        .fa-star {
            color: yellow;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <div class="form-group">
            <label for="my-select">Select Stars</label>
            <select id="my-select" class="form-control" name="stars">
                <option value="1">1_star</option>
                <option value="2">2_star</option>
                <option value="3">3_star</option>
                <option value="4">4_star</option>
                <option value="5">5_star</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </form>
    <?php
    for ($a = 0; $a < $stars; $a++) {
        echo "<i class='fas fa-star'><i/><br>";
    }
    ?>


    <?php
    // $connection = mysqli_connect("localhost", "root", "", "hotel");
    // $id = 41;
    // $sql = "SELECT * FROM rates WHERE hotelid = '$id'";
    // $res = mysqli_query($connection, $sql);
    // $season_name = 'Winter';
    // if(mysqli_num_rows($res) > 0){
    //     while($row = mysqli_fetch_assoc($res)){
    //         $accomodation[] = $row;
    //     }
    // }
    // foreach ($accomodation as $accomo_main) {
    //     if ($accomo_main["season"] == $season_name) {
    //         $accomo_rate = $accomo_main["rate"];
    //         echo '<br>' . $accomo_rate;
    //     }
    // }


    $connection = mysqli_connect("localhost", "root", "", "hotel");
    $id = 41;
    $sql = "SELECT * FROM rates WHERE hotelid = '$id'";
    $res = mysqli_query($connection, $sql);
    $season_name = 'Winter';
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $accomodation[] = $row;
            if ($row["season"] == $season_name) {
                if (!isset($accomo_rate)) $accomo_rate = $row["rate"];
                else $accomo_rate = min($accomo_rate, $row["rate"]);
            }
        }
    }
    echo $accomo_rate;
    ?>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js" integrity="sha512-igl8WEUuas9k5dtnhKqyyld6TzzRjvMqLC79jkgT3z02FvJyHAuUtyemm/P/jYSne1xwFI06ezQxEwweaiV7VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>