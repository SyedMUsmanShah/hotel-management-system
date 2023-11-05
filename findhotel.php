<?php

require_once 'sqlfunctions.php';

if (isset($_GET["Airport"])) {
    $Airport = $_GET["Airport"];
    $daterange1 = $_GET["daterange1"];
    $date_parts[0] = substr($daterange1, 0, 10);
    $date_parts[1] = substr($daterange1, 13);
    $startDate = $date_parts[0];
    $endDate = $date_parts[1];
    $startDate = date("Y-m-d", strtotime($startDate));
    $endDate = date("Y-m-d", strtotime($endDate));
    $vehiclePickup = $_GET["vehiclePickup"];
    $adultCount = $_GET["adultCount"];
    $childCount = $_GET["childCount"];
    $roomCount = $_GET["roomCount"];

    $showHotel = select_where_string("hotels", "airport", $Airport, $connection, 2);
    $season = "SELECT * FROM seasons WHERE start <= '$startDate' AND end > '$startDate'";
    $season_res = mysqli_query($connection, $season);
    if (mysqli_num_rows($season_res) > 0) {
        while ($season_row = mysqli_fetch_assoc($season_res)) {
            $season_data[] = $season_row;
        }
        $season_data = array_shift($season_data);
    }
    $season_name = $season_data["name"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find hotel</title>
    <?php require_once './include/head.php' ?>
</head>

<body>
    <?php require_once './include/navbar.php' ?>
    <section class="">
        <section class="top_search_strip text-center text-lg-left pt-2 pb-2 pt-lg-3 pb-lg-3 ">
            <button class="btn btn-primary d-none"><i class="fas fa-search"></i>Modify search</button>
            <div class="container p-sm-0 d-none d-lg-block">
                <div class="d-flex">
                    <div class="flex-fill">
                        <h2 class="blue-text"><i class="fas fa-plane"></i> Airport : <?php echo $Airport; ?></h2>
                    </div>
                    <div class="flex-fill">
                        <h2 class="blue-text"><i class="fas fa-calendar"></i> Check In / Out : <?php echo $daterange1; ?></h2>
                    </div>
                    <div class="flex-fill">
                        <h2 class="blue-text"><i class="fas fa-bed"></i> Rooms :<?php echo $roomCount; ?></h2>
                    </div>
                    <div class="flex-fill">
                        <div class="blue-text text-right">
                            <i class="fas fa-search"></i>
                            Change Search
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="search_title d-none d-lg-block">
            <div class="container p-sm-0">
                <div class="pt-3 pb-3 mb-3">
                    <h2 class="font-weight-bold blue-text">
                        <span>Showing </span>
                        <span class="count" id="avl-hotels"></span>
                        <span>of</span>
                        <span class="count" id="tot-hotels"></span>
                        <span> Hotels Near <?php echo $Airport; ?></span>
                    </h2>
                </div>
            </div>
        </section>
        <section class="search_main">
            <div class="container">
                <div class="row">
                    <aside class="d-none d-lg-block col-lg-3 pl-0 mb-5">
                        <div class="hotel_map">
                            <img class="img-fluid" src="https://www.stayparktravel.com/images/map-ico.png" alt="" srcset="">
                            <button type="button" class="blue-text btn-block bg-white border-0 p-2">Show Map</button>
                        </div>
                        <div class="filters">
                            <h2 class="pt-3 pb-3 text-dark">Search by property name</h2>
                            <div class="form-group mb-0">
                                <input type="text" name="" id="byProperty" class="form-control form_control_reset" placeholder="Property Name">
                            </div>
                        </div>
                        <div class="filters">
                            <h2 class="pt-3 pb-3 text-dark">Filter properties by</h2>
                        </div>
                        <div class="sub_filters pl-1 pb-3 mb-3">
                            <h3 class="font_bold text-dark">Sort By</h3>
                            <div class="radio_filters pl-1">
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input tabs-sort" name="optsort" id="Recommended" checked>
                                    <label class="form-check-label" for="Recommended">Recommended</label>
                                </div>
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input tabs-sort" name="optsort" id="Hotel-Name">
                                    <label class="form-check-label" for="Hotel-Name">Hotel Name</label>
                                </div>
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input tabs-sort" name="optsort" id="Rating">
                                    <label class="form-check-label" for="Rating">Rating</label>
                                </div>
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input tabs-sort" name="optsort" id="Price">
                                    <label class="form-check-label" for="Price">Price</label>
                                </div>
                            </div>
                        </div>
                        <div class="sub_filters pl-1 pb-3 mb-3">
                            <h3 class="font_bold text-dark">Property Class</h3>
                            <div class="star_filters pl-1">
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input" id="any" name="star_rating" checked>
                                    <label class="form-check-label" for="any">Any</label>
                                </div>
                            </div>
                            <div class="star_filters pl-1">
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input" id="3star" name="star_rating">
                                    <label class="form-check-label" for="3star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="star_filters pl-1">
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input" id="4star" name="star_rating">
                                    <label class="form-check-label" for="4star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="star_filters pl-1">
                                <div class="form-check mt-1">
                                    <input type="radio" class="form-check-input" id="5star" name="star_rating">
                                    <label class="form-check-label" for="5star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="sub_filters pl-1 border-0">
                            <h3 class="font_bold text-dark">Price Per Night</h3>
                            <div class="price_filters pl-1">
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="radio" name="price_set" id="Allprice" checked>
                                    <label class="form-check-label" for="Allprice">All</label>
                                </div>
                                <div class="form-check mt-1">
                                    <input class="form-check-input price_set_min_radio" type="radio" name="price_set" id="lowprice">
                                    <label class="form-check-label" for="lowprice"><span class="price_set_min">Less then $25</span></label>
                                </div>
                                <div class="form-check mt-1">
                                    <input class="form-check-input price_set_min_radio" type="radio" name="price_set" id="midprice">
                                    <label class="form-check-label" for="midprice"><span class="price_set_min">$25 to $112</span></label>
                                </div>
                                <div class="form-check mt-1">
                                    <input class="form-check-input price_set_min_radio" type="radio" name="price_set" id="highprice">
                                    <label class="form-check-label" for="highprice"><span class="price_set_min">$200 to $299</span></label>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <main class="col-lg-9 p-sm-0 mb-5 " id="main_right">
                        <div class="hotel-main mt-2 mt-lg-0">
                            <?php if (!empty($showHotel)) { ?>
                                <?php foreach ($showHotel as $mianHotel) { ?>
                                    <?php
                                    $id = $mianHotel["id"];
                                    $stars = select_where("stars", "hotelid", $id, $connection, 1);
                                    $accomo_sql = "SELECT * FROM rates WHERE hotelid = $id AND season = '$season_name' ORDER BY rate ASC LIMIT 1";
                                    $acc_res = mysqli_query($connection, $accomo_sql);
                                    if(mysqli_num_rows($acc_res) > 0){
                                        while($acc_row = mysqli_fetch_assoc($acc_res)){
                                            $acc_data[] = $acc_row;
                                        }
                                    }
                                        foreach($acc_data as $acc_main){
                                            $acc_room = $acc_main["room"];
                                            $acc_rate = $acc_main["rate"];
                                        }
                                    ?>
                                    <div class="hotel-box amHotel divs mb-2 dupeid-OZALB690" data-name="<?php echo $mianHotel["name"] ?>" data-stars="<?php echo $stars["stars"] ?>" data-price="<?php echo $acc_rate; ?>">
                                        <div class="card hotel_card">
                                            <div class="row no-gutters hotel_card_row">
                                                <div class="col-4 col-md-4 hotel_card_col_1 pointer">
                                                    <img src="./img/<?php echo $mianHotel["logo"] ?>" alt="" srcset="" class="card-img h-100">
                                                </div>
                                                <div class="col-8 col-md-5 hotel_card_col_2 pointer">
                                                    <div class="card-body pt-2 pr-2 pb-2 pl-2 pt-md-1 min-height-sm min-height-xs">
                                                        <div class="hotel_title pb-1 height-20-xs">
                                                            <h2 class="xs-font-16 font-weight-xs "><?php echo $mianHotel["name"] ?></h2>
                                                        </div>
                                                        <div class="customer_review d-inline pb-1">
                                                            <span class="text-secondary">
                                                                <?php
                                                                $rating = $stars["stars"];
                                                                for ($i = 0; $i < $rating; $i++) {
                                                                    echo "<i class='fas fa-star'></i>";
                                                                }
                                                                ?>
                                                            </span>
                                                        </div>
                                                        <div class="top_amenities pb-1 d-none d-md-block">



                                                            <?php
                                                            $hotel_services = "SELECT services.faIcon, hotelservices.service, hotelservices.hotelid
                                FROM hotelservices
                                INNER JOIN services ON services.serviceName = hotelservices.service && hotelservices.hotelid = $id;";
                                                            $ser_res = mysqli_query($connection, $hotel_services);
                                                            if (mysqli_num_rows($ser_res) > 0) {
                                                                while ($ser_row = mysqli_fetch_array($ser_res)) {
                                                            ?>
                                                                    <span class="<?php echo $ser_row["faIcon"] ?>"></span>
                                                            <?php
                                                                }
                                                            }
                                                            ?>




                                                        </div>
                                                        <div class="other_detail text-dark p-0 pl-md-1 xs-font-12">
                                                            <div class="location_text pb-2 pt-2 pb-md-1 pt-md-0">
                                                                <i class="fas fa-map-marker-alt text-secondary xs-font-12"></i>
                                                                <?php echo $mianHotel["location"] ?>
                                                            </div>
                                                            <div class="distance_info">
                                                                <p class="pb-3 pt-2 pt-md-0 pb-md-1 ">
                                                                    <i class="fas fa-plane-departure text-secondary xs-font-12"></i>
                                                                    <?php echo $mianHotel["distance"] ?>
                                                                </p>
                                                                <p class="pb-1">Airport Shuttle Hour: <?php echo $mianHotel["shuttle"] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="breakfast_included pb-1 pl-1 d-none d-md-block">
                                                            <i class="fas fa-coffee"></i>
                                                            Free Breakfast Included
                                                        </div>
                                                        <div class="lowest_info pb-1 pl-1 d-none d-md-block">
                                                            <i class="fas fa-thumbs-up"></i>
                                                            Lowest Rate Guarantee
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3 text-md-right text-dark hotel_card_col_3">
                                                    <div class="pr-0 pr-md-2 liveRoomRates zeeHotelHtml_1879">
                                                        <div class="price_detail">
                                                            <div class="pt-2 d-none d-md-block parking_text">Room Package Includes Parking</div>
                                                            <div class="d-none d-md-block bed_info pt-1">
                                                                <i class="fas fa-bed text-secondary"></i>
                                                                <?php
                                                                echo $acc_room;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row no-gutters p-3 p-md-0 border-top-xs border-top-sm liveRoomRatesBtn requestFalse zeeHotel_1879">

                                                            <div class="col-6 d-block d-md-none">
                                                                <p class="d-block d-md-none font-weight-bold xs-font-12 pt-2 text-success">Room Package Includes Parking</p>
                                                            </div>
                                                            <div class="dollar_price pt-0 pt-md-1 col-6 col-md-12 text-right">
                                                                <span class="package_rate font-weight-xs font-weight-sm sm-price-btn xs-price-btn">
                                                                    <span><a href="./bookhotel.php?id=<?php echo $id ?>&check_in=<?php echo $startDate ?>&check_out=<?php echo $endDate ?>&vehicle_pickup=<?php echo $vehiclePickup ?>&adult=<?php  echo $adultCount ?>&child=<?php echo $childCount ?>&rooms=<?php echo $roomCount ?>&price=<?php echo $acc_rate ?>&accomo=<?php echo $acc_room ?>" target="_blank"   class="book-btn-sm-xs d-lg-none d-md-none d-xl-none">Book Now</a></span>
                                                                    <span class="xs_price_app">
                                                                        <span class="dollar">$</span>
                                                                        <?php 
                                                                        echo $acc_rate;
                                                                        ?>
                                                                    </span>
                                                                    <span class="superscript xs-none sm-none">
                                                                        <span>USD</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="pt-1 col-6 col-md-12 d-none d-md-block">
                                                                <a href="./bookhotel.php?id=<?php echo $id ?>&check_in=<?php echo $startDate ?>&check_out=<?php echo $endDate ?>&vehicle_pickup=<?php echo $vehiclePickup ?>&adult=<?php  echo $adultCount ?>&child=<?php echo $childCount ?>&rooms=<?php echo $roomCount ?>&price=<?php echo $acc_rate ?>&accomo=<?php echo $acc_room ?>" target="_blank" class="btn btn-success btn-block booking-btn-status">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </main>
                </div>
            </div>
        </section>
    </section>


    <?php require_once './include/footer.php' ?>

    <script>
        $(document).ready(function() {
            $("#Hotel-Name").click(function() {
                var result = $('.hotel-box').sort(function(a, b) {
                    var contentA = $(a).data('name');
                    var contentB = $(b).data('name');
                    return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
                }).appendTo(".hotel-main")
            })
            $("#Price").click(function() {
                var result = $('.hotel-box').sort(function(a, b) {
                    var contentA = parseInt($(a).data('price'));
                    var contentB = parseInt($(b).data('price'));
                    return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
                }).appendTo(".hotel-main")
            })
            $("#Rating").click(function() {
                var result = $('.hotel-box').sort(function(a, b) {
                    var contentA = parseInt($(a).data('stars'));
                    var contentB = parseInt($(b).data('stars'));
                    return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
                }).appendTo(".hotel-main")
            })
            $("#3star").click(function() {
                $(".hotel-box[data-stars='3']").show();
                $(".hotel-box[data-stars='4'], .hotel-box[data-stars='5']").hide();
            })
            $("#4star").click(function() {
                $(".hotel-box[data-stars='4']").show();
                $(".hotel-box[data-stars='3'], .hotel-box[data-stars='5']").hide();
            })
            $("#5star").click(function() {
                $(".hotel-box[data-stars='5']").show();
                $(".hotel-box[data-stars='3'], .hotel-box[data-stars='4']").hide();
            })
            $("#any").click(function() {
                $(".hotel-box[data-stars='5'], .hotel-box[data-stars='3'], .hotel-box[data-stars='4']").show();
            })
            $("#Allprice").click(function() {
                $(".hotel-box").show();
            })
            $("#lowprice").click(function() {
                $(".hotel-box").show();
                $(".hotel-box").filter(function() {
                    return $(this).data("price") > 25
                }).hide();
            })
            $("#midprice").click(function() {
                $(".hotel-box").show();
                $(".hotel-box").filter(function() {
                    return $(this).data("price") < 25
                }).hide();
                $(".hotel-box").filter(function() {
                    return $(this).data("price") > 120
                }).hide();
            })
            $("#highprice").click(function() {
                $(".hotel-box").show();
                $(".hotel-box").filter(function() {
                    return $(this).data("price") < 200
                }).hide();
            })

            $('#byProperty').keyup(function() {
                var searchQuery = $('#byProperty').val().toLowerCase();
                $('.hotel-box').each(function() {
                    var itemText = $(this).text().toLowerCase();
                    if (itemText.indexOf(searchQuery) != -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            $i = 0;
            $(".hotel-box").each(function() {
                $i++
            })
            $(".count").text($i)
        })
    </script>
</body>

</html>