<?php
require_once 'connection.php';
if (isset($_POST["findHotel"])) {
    $Airport = $_POST["Airport"];
    $daterange1 = $_POST["daterange1"];
    $vehiclePickup = $_POST["vehiclePickup"];
    $adultCount = $_POST["adultCount"];
    $childCount = $_POST["childCount"];
    $roomCount = $_POST["roomCount"];

    header("location:findhotel.php?Airport=$Airport&daterange1=$daterange1&vehiclePickup=$vehiclePickup&adultCount=$adultCount&childCount=$childCount&roomCount=$roomCount");

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './include/head.php' ?>
</head>

<body>
    <?php require_once './include/navbar.php' ?>


    <div id="hotelsearchbox">
        <div class="search-bg hotels py-0 pb-2 blue-bg py-sm-4 pb-sm-0" style="background-image:url(https://www.stayparktravel.com/airports-pictures/153079429263.jpg) !important;">
            <div class="container p-0">
                <div class="main-search">
                    <div class="row">
                        <div class="col-12 main-left-search pl-0 pr-0 pr-md-2 col-sm-12 col-md-12 col-lg-11 col-xl-10">
                            <div class="search-titles text-dark py-3 bg px-4 border-bottom bg-light2 border-px-rounded xs-border-0">
                                <h1 class="set-heading font-w-600 xs-font-18 xs-shadow-0 mb-1 font-24 text-dark xs-text-blue">
                                    Airport Hotels and Parking Deals
                                </h1>
                                <h2 class="set-sub-heading font-w-400 font-14 xs-font-16 xs-shadow-0 mb-1 text-dark xs-text-blue">
                                    Free Airport Parking With One Night Hotel Stay
                                </h2>
                            </div>
                            <div class="main-links d-none d-sm-block d-md-block d-lg-block d-xl-block">
                                <ul class="nav nav-pills bg-white bg-light2 px-2 shadow">
                                    <li class="p-3 hotelstab active">
                                        <a class="searchboxhtml font-weight-bold" href="">
                                            <span class="d-none d-md-block">AIRPORT HOTELS WITH PARKING</span>
                                            <div class="xs-text d-block d-md-none text-center text-white">
                                                <div class="font-12 blue-text pt-1">
                                                    <i class="fa fa-bed"></i>
                                                    <i class="fa fa-plus font-10"></i>
                                                    <i class="fa fa-car"></i>
                                                </div>
                                                <h3 class="font-10 text-uppercase m-0 py-1 font-w-700">park stay fly</h3>
                                            </div>

                                        </a>
                                    </li>
                                    <li class="px-sm-5 py-3 flightstab">
                                        <a class="searchboxhtml font-weight-bold text-muted" href="">
                                            <span class="d-none d-md-block">FLIGHTS </span>
                                            <div class="xs-text d-block d-md-none text-center text-white">
                                                <div class="font-12 blue-text pt-1">

                                                    <i class="fa fa-plane"></i>
                                                </div>
                                                <h3 class="font-10 text-uppercase m-0 py-1 font-w-700">FLIGHTS</h3>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px-md-4 py-3 carstab ">
                                        <a class="searchboxhtml font-weight-bold text-muted" href="">
                                            <span class="d-none d-md-block">CARS</span>
                                            <div class="xs_text d-block d-md-none text-center text-white">
                                                <div class="font-12 blue-text pt-1">
                                                    <i class="fa fa-car"></i>
                                                </div>
                                                <h3 class="font-10 text-uppercase m-0 py-1 font-w-700">cars</h3>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <div class="choose-packges d-none d-md-flex bg-white search-b-shadow border-top pt-4 px-3">
                                <ul class="nav nav-pills ml-1">
                                    <li class="nav-item active mr-3">
                                        <a class="nav-link active" href="#">
                                            Park Stay Fly Packages
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" href="#">
                                            Cruise & Parking
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" href="#">
                                            Hotel Room Only
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" href="#">
                                            Parking Only
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="xs-choose-packges pt-1 d-block d-md-none">
                                <div class="row m-0">
                                    <div class="col-6 pr-1 form-group pl-0">
                                        <select name="" id="" class="font-12 form-control rounded-0 search-box-type">
                                            <option value="Park Stay Fly Packages" selected>Park Stay Fly Packages</option>
                                            <option value="Cruise Packages">Cruise Packages</option>
                                            <option value="Hotel Room Only">Hotel Room Only</option>
                                            <option value="Parking Only">Parking Only</option>
                                        </select>
                                    </div>
                                    <div class="col-6 pr-1 form-group pl-0">
                                        <select name="" id="" class="font-12 form-control rounded-0 change-trip-type">
                                            <option value="Room at the start" selected>Room at the start</option>
                                            <option value="Room at the end ">Room at the end </option>
                                            <option value="Room at the start and end">Room at the start and end</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-white xs-bg-transparent mb-xl-0 p-md-0 pb-md-4 pb-lg-2">
                                <nav class="navbar navbar-expand-sm p-0 psh-round-trip-info xs-none sm-none">
                                    <ul class="navbar-nav list-group list-group-horizontal pt-4 pb-1 px-3 ml-2">
                                        <li class="nav-item active">
                                            <a class="px-0 nav-link" href="">
                                                Room at the start of trip
                                            </a>
                                        </li>
                                        <li class="nav-item mx-4 px-2">
                                            <a class="px-0 nav-link" href="">
                                                Room at the end of trip
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="px-0 nav-link" href="">
                                                Room at the start and end of trip
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="search-forms">
                                    <form action="" method="post" style="display: inline;">
                                        <div class="row xs-m-0 pt-sm-0 m-0 px-0 mx-1 px-md-3 pt-md-4">
                                            <div class="form-group col-12 p-0 pb-2 mb-2 col-sm-12 col-md-6 col-lg-12 px-lg-0 px-md-1 mb-md-3 autocomplete">
                                                <div class="input-group">
                                                    <span class="left-icon"><i class="fa fa-search font-14 blue-text"></i></span>
                                                    <input type="text" name="Airport" id="myInput" placeholder="Enter Airport or Cruise Port" class="pl-5 form-control xs-font-16 position-relative" style="position: relative; z-index: auto;" required>
                                                </div>
                                            </div>
                                            <div class="col-12 rounded-0 p-0 mb-3 px-lg-0 px-md-1 mb-md-3 col-sm-12 col-md-6">
                                                <div class="border form-control rounded-0 d-flex px-2 zeeDatePicker-hotelStartTrip">
                                                    <div class="d-flex left-icon">
                                                        <i class="fas fa-calendar-alt font-16 blue-text"></i>
                                                    </div>
                                                    <div class="left pl-4 ml-3">Check-in / out


                                                        <div name="dateForm" class="form-horizontal">
                                                            <div class="form-group">
                                                                <input date-range-picker id="daterange1" name="daterange1" class="form-control date-picker" type="text" ng-model="date" required ng-change="SimplePickerChange();" />
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="right pl-5">Vehicle Pickup
                                                        <input type="text" name="vehiclePickup" id="" class="Vehicle-Pickup" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
                                                    </div>







                                                </div>

                                            </div>
                                            <div class="w-100 col-12 adults_children_rooms_strip pb-3 px-0 col-sm-12 col-md-6 col-lg-4 pb-md-0 px-lg-1 px-lg-2 px-md-1">
                                                <div class="update-dropdown bg-white rounded-0 ">
                                                    <div class="d-flex left-icon">
                                                        <i class="fas fa-user font-16 blue-text"></i>
                                                    </div>
                                                    <div class="d-flex selectorarc pl-5 pt-3 form-control text-center xs-font-16 xs-label-color h-55px border">

                                                        <div class="pr1">
                                                            <span class="show-count-adults"></span>
                                                            <span class="font-10">
                                                                <span class="adult-counter-text">Adult</span>
                                                                ,
                                                            </span>
                                                        </div>
                                                        <div class="pr1 Child-counter-row" style="display: none;">
                                                            <span class="show-count-Childrens"></span>
                                                            <span class="font-10">
                                                                <span class="Child-counter-text">Child(rens)</span>
                                                                ,
                                                            </span>
                                                        </div>
                                                        <div class="pr1">
                                                            <span class="show-count-rooms"></span>
                                                            <span class="font-10">
                                                                <span class="room-counter-text">Room</span>
                                                            </span>
                                                        </div>

                                                        <div class="dropdownmenu ">
                                                            <div class="row m-0 Adult">
                                                                <div class="col-6 ">
                                                                    Adult(s)
                                                                </div>
                                                                <div class="col-6 count">
                                                                    <span class="btn Adult-minus-btn">
                                                                        <i class="fa fa-minus"></i>
                                                                    </span>
                                                                    <span><input type="text" name="adultCount" id="" value="1" class="Adult-count" readonly></span>
                                                                    <span class="btn Adult-plus-btn">
                                                                        <i class="fa fa-plus"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0 childrens">
                                                                <div class="col-6 ">
                                                                    child(rens)
                                                                </div>
                                                                <div class="col-6 count">
                                                                    <span class="btn Child-minus-btn">
                                                                        <i class="fa fa-minus"></i>
                                                                    </span>
                                                                    <span><input type="text" name="childCount" id="" value="0" class="Child-count" readonly></span>
                                                                    <span class="btn Child-plus-btn">
                                                                        <i class="fa fa-plus"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0 rooms">
                                                                <div class="col-6 ">
                                                                    Rooms(s)
                                                                </div>
                                                                <div class="col-6 count">
                                                                    <span class="btn Room-minus-btn">
                                                                        <i class="fa fa-minus"></i>
                                                                    </span>
                                                                    <span><input type="text" name="roomCount" id="" value="1" class="Room-count" readonly></span>
                                                                    <span class="btn Room-plus-btn">
                                                                        <i class="fa fa-plus"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 done">
                                                                <button type="button" class="btn btn-success btn-block m-2 btn-sm ">Done</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 search-btn p-0 col-sm-12 col-md-6 col-lg-2 col-xl-2 px-md-0">
                                                <button type="submit" class="btn btn-success  text-white btn-md btn-block font-14 h-55px rounded-0" name="findHotel">Find Hotels </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php  require_once './include/footer.php' ?>
</body>

</html>