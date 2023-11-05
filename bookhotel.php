<?php
require_once './sqlfunctions.php';



if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $check_in = $_GET["check_in"];
    $check_out = $_GET["check_out"];
    $vehicle_pickup = $_GET["vehicle_pickup"];
    $adult = $_GET["adult"];
    $child = $_GET["child"];
    $rooms = $_GET["rooms"];
    $price = $_GET["price"];
    $accomo = $_GET["accomo"];
}
$date1 = new DateTime($check_in);
$date2 = new DateTime($check_out);
$interval = $date1->diff($date2);
$nights = $interval->format("%a");
$total = $price*$nights*$rooms;


if(isset($_POST["confirm"])){
    $guest_arr = array(
        "f_name" => $_POST["fname"],
        "l_name" => $_POST["lname"],
        "email" => $_POST["email"],
        "number" => $_POST["phone"],
        "check_in" => $check_in,
        "check_out" => $check_out,
        "car_pickup" => $vehicle_pickup,
        "adults" => $adult,
        "child" => $child,
        "rooms" => $rooms,
        "room_type" => $accomo,
        "rate" => $total,
    );
    insert_func("guest", $guest_arr, $connection);
    $guest_id = mysqli_insert_id($connection);
    $exp = $_POST["cmonth"] . "-" . $_POST["cyear"];
    $payment_arr = array(
        "c_name" => $_POST["cName"],
        "c_number" => $_POST["cNumber"],
        "exp" => $exp,
        "cvc" => $_POST["cCode"],
        "address" => $_POST["address"],
        "zip" => $_POST["zip"],
        "guest_id" => $guest_id,
    );
    insert_func("payment", $payment_arr, $connection);
}







$hotel = select_where("hotels", "id", $id, $connection, 1);
$stars = select_where("stars", "hotelid", $id, $connection, 1);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './include/head.php' ?>
</head>

<body>
    <div class="border-bottom bg-white">
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-light  m-0 px-sm-0 px-3 px-sm-0 px-3">
                <a class="navbar-brand " href="">
                    <img src="https://www.stayparktravel.com/images/stayparktravel-simple-logo.com.svg" class="img-fluid" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="navbar-collapse justify-content-end collapse">
                    <ul class="navbar-nav font-12 ">
                        <li class="nav-item ">
                            <a class="nav-link text-dark" href="tel:+1-855-301-3111"> <i class="fa fa-phone"></i>+1-855-301-3111 </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blue-text sign_in" href="">
                                <i class="fa fa-user">Sign In</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="bg-light-2">
        <div class="secure_text py-2 box-shadow d-flex justify-content-center bg-light mb-sm-4 mb-0">
            <ul class="list-group list-group-horizontal p-0 m-0 font-10 text-muted xs-font-10">
                <li class="list-group-item px-3 py-0 border-0 bg-transparent text-success font-weight-bold">
                    <i class="fas fa-shield-alt px-1 text-success"></i> SECURE CHECKOUT
                </li>
                <li class="list-group-item px-3 py-0 border-0 bg-transparent text-success font-weight-bold d-none d-md-block">
                    <i class="far fa-clock px-1 text-success"></i> 24-HOUR SERVICE
                </li>
                <li class="list-group-item px-3 py-0 border-0 bg-transparent text-success font-weight-bold">
                    <i class="fas fa-check-double px-1 text-success"></i> TRUSTED PAYMENTS
                </li>
            </ul>
        </div>
        <div>
            <div class="container p-sm-0 pt-sm-0 pt-2">
                <form action="" method="post">
                    <h3 class="text-muted font-12 font-weight-normal py-1 d-none d-lg-block"><span class="font-weight-bold">Almost done! </span> Enter your details and complete your booking now.</h3>
                    <div class="row">
                        <div class="col-12 col-lg-4 order-lg-12 px-md-2 px-3 d-flex flex-column">
                            <div class="row1">
                                <div class="overflow-hidden" style="height:130px;background-size:cover !important;background-repeat:no-repeat;background-position:center !important; background:url('./img/<?php echo $hotel["logo"]; ?>')"></div>
                                <div class="py-2">
                                    <h3 class="font-12 text-black mb-1 font-weight-bold"><?php echo $hotel["name"]; ?></h3>
                                    <div class="text-muted font-10">
                                        <p class="m-0">
                                            <i class="fas fa-map-marker-alt text-secondary"></i><?php echo $hotel["location"]; ?>
                                        </p>
                                        <p class="m-0">
                                            <i class="fas fa-map-marker-alt text-secondary"></i><?php echo $hotel["distance"]; ?>
                                        </p>
                                    </div>
                                    <ul class="list-inline m-0 pt-1">
                                        <li class="d-inline">
                                            <?php
                                            $rating = $stars["stars"];
                                            for ($i = 0; $i < $rating; $i++) {
                                                echo "<i class='fas fa-star'></i>";
                                            }
                                            ?>
                                        </li>
                                        <li class="d-inline"></li>
                                        <li class="d-inline"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dates_right border-bottom pb-2">
                                <div class="reservation_dates">
                                    <div class="udpate_date font-10">
                                        <div class="date_label d-flex">
                                            <div class="w-100px">
                                                <span class="font-weight-bold w-100px d-block">Check-in/Out</span>
                                            </div>
                                            <div class="flex-fill d-flex flex-wrap">
                                                <div class="s_flex_basis">
                                                    <span class="dates s_trip_block ml-2"><?php echo $check_in; ?></span>
                                                    <span class="s_trip_none_dash px-1">-</span>
                                                    
                                                </div>
                                                <div>
                                                    <span class="dates ml-2"><?php echo $check_out; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date_label d-flex pt-1">
                                            <div class="w-100px">
                                                <span class="font-weight-bold w-100px d-block">Car Pick-up:</span>
                                            </div>
                                            <div class="flex-fill d-flex flex-wrap">
                                                <div class="dates ml-2"><?php echo $vehicle_pickup; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 other_hotel_info">
                                <div class="guests_rooms font-12 text-muted">
                                    <div class="row m-0">
                                        <div class="col text-left pl-0">
                                            <h3 class="font-12 text-black font-weight-bold mb-2">Guests and Rooms </h3>
                                        </div>
                                        <div class="col text-right pr-0">
                                            <input type="button" value="Edit Reservation" class="pointer font-10 text-info border-0">
                                        </div>
                                    </div>
                                    <div class="font-10">
                                        <div class="py-1 d-inline pr-2">
                                            <i class="fa fa-users text-dark"></i>
                                            Guest(s):
                                            <span id="guest"><?php echo $adult ?></span>
                                        </div>
                                        <div class="children_div py-1 pr-2 px-0">
                                            <i class="fa fa-child text-dark"></i>
                                            Children:
                                            <span class="children"><?php echo $child ?></span>
                                        </div>
                                        <div class="py-1 d-inline pr-2 px-0">
                                            <i class="fa fa-key text-dark"></i>
                                            Room(s):
                                            <span class="room"><?php echo $rooms ?></span>
                                        </div>
                                        <div class="py-1 d-inline pr-2">
                                            <i class="fa fa-moon text-dark"></i>
                                            Night(s):
                                            <span id="night"><?php echo $nights ?></span>
                                        </div>
                                    </div>
                                    <div class="reservation_dates_div" style="display: none;"></div>
                                </div>
                                <div class="room_rate_night text-muted py-3">
                                    <h3 class="font-12 text-black font-weight-bold mb-2">Package and Bed Type</h3>
                                    <div class="text-muted pb-1 font-10">
                                        <span class="nights"></span><?php echo $nights ?> Night Hotel Stay -
                                        <i class="fa fa-car text-dark"></i> &nbsp;
                                        <span class="included_parking_days"></span> Free Parking <?php echo $nights ?> Days Package
                                    </div>
                                    <div class="font-10">
                                        <i class="fa fa-bed text-dark"></i>
                                        <span><?php echo $accomo ?></span>
                                    </div>
                                </div>
                                <div class="nightly_rates text-muted">
                                    <h3 class="font-12 text-black font-weight-bold mb-2">Rate and Night Stay</h3>
                                    <p class="set_light_height mb-0 font-10">
                                        <span class="d-block">$<span class="sub_total"><?php echo $price ?></span></span>
                                        <span class="d-block">
                                            Number of nights x <span class="nights"><?php echo $nights ?></span>
                                        </span>

                                    </p>
                                </div>
                                <!-- <div class="sale_fee py-2 border-top border-bottom font-10 text-muted my-2">
                                    <div>Taxes and fees $ <span id="tax_amount">262.57</span></div>
                                    <div class="extra_parking_div">
                                        Extra Parking Days ( <span id="extra_parking">7</span>) $ <span id="extra_parking_amount">35.00</span>
                                    </div>
                                    <div>
                                        Booking Fee <span style="text-decoration:line-through" id="BookingFee">$3.99</span>
                                    </div>
                                </div> -->
                            </div>
                            <div class="total_amount">
                                <div class="row m-0 py-0 font-18 xs-font-18 font-weight-bold text-black">
                                    <div class="col p-0">Total</div>
                                    <div class="col text-right p-0">
                                        $ <span id="total_amount"><?php
                                         echo $total;
                                          ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-code text-center mt-sm-3 mt-2 mb-md-0 mb-3">
                                <a href="" class="font-weight-normal" id="discount_link">Have a Coupon Code or Discount ID?</a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 px-sm-3 px-2 pt-lg-0 pt-3 col-lg-pull-4">
                            <div class="p-1 p-sm-4 bg-white">
                                <div class="bg-white pl-0 pt-3 px-4 pb-0 mb-0 position-relative">
                                    <div class="left_space_icon">
                                        <i class="fa fa-users font-14"></i>
                                    </div>
                                    <h4 class="pb-2 xs-font-16 font-14 pl-4"> Guest Detail</h4>
                                    <div class="row px-2">
                                        <div class="col-7 col-sm-4 col-md-4 px-1 d-table">
                                            <div class="form-group mb-3">
                                                <label for="" class="font-10 text-muted font-weight-bold mb-1">First Name</label>
                                                <input type="text" style="width: 216px;" name="fname" id="FirstName" placeholder="" class="form-control rounded-0" value="">
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-6 col-md-6 px-1">
                                            <div class="form-group mb-3">
                                                <label for="" class="font-10 text-muted font-weight-bold mb-1">Last Name</label>
                                                <input type="text" style="width: 216px;" name="lname" id="LastName" placeholder="" class="form-control rounded-0" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-5 px-1">
                                            <div class="form-group mb-3">
                                                <label for="" class="font-10 text-muted font-weight-bold mb-1">Email Address</label>
                                                <input type="text" placeholder="" name="email" class="form-control rounded-0" value="" id="email">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3 px-1">
                                            <div class="form-group mb-0">
                                                <label for="" class="font-10 text-muted font-weight-bold mb-1">Phone Number</label>
                                                <input type="text" style="width: 190px;" name="phone" id="PhoneNumber" placeholder="" class="form-control rounded-0" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white pl-0 px-4 py-3 mb-0 position-relative">
                                    <div class="left_space_icon">
                                        <i class="fas fa-credit-card font-14"></i>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-7 col-sm-8">
                                            <h4 class="pb-md-2 xs-font-16 font-14 d-md-inline d-block pl-4">Payment</h4>
                                        </div>
                                        <div class="col-5 col-sm-4 text-right pl-0">
                                            <img src="https://www.stayparktravel.com/images/visa-master-discover-ae.png" class="img-fluid h_31" alt="">
                                        </div>
                                        <div class="info_booking pl-md-0 pl-3 pt-1">
                                            <div class="d-md-inline d-block font-10 px-md-3 px-0 text-success">
                                                <i class="fa fa-check"></i> We use secure transmission
                                            </div>
                                            <div class="d-md-inline d-block font-10 px-md-1 px-0 text-success">
                                                <i class="fa fa-check"></i> We protect your personal information
                                            </div>
                                        </div>
                                    </div>
                                    <div id="cc-info" class="row">
                                        <div class="w-100 m-0">
                                            <div class="form-group col-12 col-sm-9 col-md-7 mb-3 pr-sm-0">
                                                <label for="" class="font-10 text-muted font-weight-bold mb-1">Name On Card</label>
                                                <input type="text" placeholder="" name="cName" id="FullName" class="form-control rounded-0" maxlength="30" value="">
                                            </div>
                                        </div>
                                        <div class="w-100">
                                            <div class="form-group col-10 col-sm-6 col-md-6 col-lg-6 mb-3 pr-sm-0">
                                                <label for="" class="font-10 text-muted font-weight-bold mb-1">Card NUmber</label>
                                                <input type="text" style="width:247px" placeholder="" name="cNumber" id="CardNumber" class="form-control rounded-0" maxlength="16" autocomplete="off" onfocus="validateCC();">
                                            </div>
                                        </div>
                                        <div class="pl-3 d-inline pr-2 mb-3">
                                            <label for="" class="font-10 text-muted font-weight-bold mb-1">Expiration date</label>
                                            <div class="row m-0">
                                                <div class="d-table pr-2">
                                                    <select class="form-control rounded-0" name="cmonth">
                                                        <option value="" selected="">Month</option>
                                                        <option value="01">01-Jan</option>
                                                        <option value="02">02-Feb</option>
                                                        <option value="03">03-Mar</option>
                                                        <option value="04">04-Apr</option>
                                                        <option value="05">05-May</option>
                                                        <option value="06">06-Jun</option>
                                                        <option value="07">07-Jul</option>
                                                        <option value="08">08-Aug</option>
                                                        <option value="09">09-Sep</option>
                                                        <option value="10">10-Oct</option>
                                                        <option value="11">11-Nov</option>
                                                        <option value="12">12-Dec</option>
                                                    </select>
                                                </div>
                                                <div class="d-table">
                                                    <select class="form-control rounded-0" name="cyear">
                                                        <option value="" selected="">Year</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>
                                                        <option value="2033">2033</option>
                                                        <option value="2034">2034</option>
                                                        <option value="2035">2035</option>
                                                        <option value="2036">2036</option>
                                                        <option value="2037">2037</option>
                                                        <option value="2038">2038</option>
                                                        <option value="2039">2039</option>
                                                        <option value="2040">2040</option>
                                                        <option value="2041">2041</option>
                                                        <option value="2042">2042</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-3 col-md-3 form-group px-sm-1 mb-3">
                                            <label for="" class="font-10 text-muted font-weight-bold mb-1">CVC</label>
                                            <div><input placeholder="" style="width:80px" type="text" name="cCode" id="cCode" class="form-control rounded-0" autocomplete="off"></div>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-7 pr-sm-2 mb-sm-0 mb-1">
                                            <label for="" class="font-10 text-muted font-weight-bold mb-1">Address</label>
                                            <div><input name="address" placeholder="" id="Address" class="form-control rounded-0" value=""></div>
                                        </div>
                                        <div class="form-group col-5 col-sm-3 col-md-3 mb-0 pl-sm-1 mb-0 px-sm-0">
                                            <label for="" class="font-10 text-muted font-weight-bold mb-1">Zip / Postal<span class="d-none d-xl-inline d-lg-none d-md-inline d-sm-inline">Code</span></label>
                                            <div class="input-group mb-0 rounded-0">
                                                <input type="text" name="zip" id="ZipPostal" maxlength="10" class="form-control rounded-0 pr-0" placeholder="" value="" autocomplete="off" onkeyup="get_state_by_zip(this.value)" onblur="get_state_by_zip(this.value)">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white pl-0 px-4 pt-3 pb-4 mb-0 position-relative ">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-12 col-md-7 col-lg-7 px-sm-0 text-center text-sm-left">
                                            <div class="row">
                                                <div class="col-6 text-sm-center py-2 py-sm-0">
                                                    <h5 class="pay_today font-12 text-muted">
                                                        <span class="font-10 d-block">Pay Today:</span>
                                                        <span class="blue-text font-weight-bold">$</span>
                                                        <span class="blue-text font-weight-bold total_deposit total_deposit_discounted green_color"><?php echo $total ?></span>
                                                    </h5>
                                                </div>
                                                <div class="col-6 text-sm-center py-2 py-sm-0">
                                                    <h5 class="pay_today font-12 text-muted">
                                                        <span class="font-10 d-block">Due at Hotel:</span>
                                                        <span class="blue-text font-weight-bold">$</span>
                                                        <span class="blue-text font-weight-bold remaining_total green_color"><?php echo $total ?></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 d-none d-sm-block text-center p-0">
                                                    <h5 class="text-success font-10 mb-3 mb-md-0">
                                                        <span class="fa fa-check"></span>&nbsp; &nbsp; Free Cancellation
                                                    </h5>
                                                </div>
                                                <div class="col-sm-6 d-none d-sm-block text-center p-0">
                                                    <h5 class="text-success font-10 mb-3 mb-md-0">
                                                        <span class="fa fa-check"></span>&nbsp; &nbsp; No Booking Fee
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 text-center pt-0 pt-sm-0 pr-" id="reservation_btn" style="display: block;">
                                            <input type="submit" name="confirm" value="Confirm Reservation" class="btn btn-lg btn-block btn-success font-weight-bold sm-font-16">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center privacy_policy py-sm-4 py-2 mx-3">
            <p class="font-10 m-0 text-muted">We will never sell your personal information and we use secure transmission to protect your personal information.</p>
            <p class="font-10 text-muted">Read our <a href="#">Privacy Policy</a> for more information.</p>
        </div>
    </div>



    <?php require_once './include/footer.php' ?>

    <script>
        $(document).ready(function(){
            $child = $(".children").text();
            console.log($child);
            if($child > 0 ){
                $(".children_div").addClass("d-inline");
            }else{
                $(".children_div").hide();
            }
        })
    </script>
</body>

</html>