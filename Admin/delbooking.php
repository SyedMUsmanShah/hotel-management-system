<?php
require_once '../connection.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $booking = "SELECT * FROM guest WHERE id = $id";

    $booking_res = mysqli_query($connection, $booking);

    if(mysqli_num_rows($booking_res)>0){
        while($booking_row = mysqli_fetch_array($booking_res)){
            $booking_data[] = $booking_row;
        }
    }
    $booking_data = array_shift($booking_data);
    
    $Del_book_sqli = "DELETE FROM guest WHERE id=$id";
    $Del_book_res = mysqli_query($connection, $Del_book_sqli);



    $payment = "SELECT * FROM payment WHERE guest_id = $id";

    $payment_res = mysqli_query($connection, $payment);

    if(mysqli_num_rows($payment_res)>0){
        while($payment_row = mysqli_fetch_array($payment_res)){
            $payment_data[] = $payment_row;
        }
    }
    $payment_data = array_shift($payment_data);
    
    $Del_payment_sqli = "DELETE FROM payment WHERE guest_id=$id";
    $Del_payment_res = mysqli_query($connection, $Del_payment_sqli);
    header('location:bookings.php');
}

?>