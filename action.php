<?php
    include_once 'conn.php';

    $sql = "INSERT INTO registered_person (first_name,last_name,mobile_number,email_address,block_no,lot_no,street,barangay,city,province,country,status_vacc) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, "ssisiissssss", $fname, $lname, $mobile, $email, $block, $lot, $street, $barangay, $city, $province, $country,$status);

    $fname = $_REQUEST['firstname'];
    $lname = $_REQUEST['lastname'];
    $mobile = $_REQUEST['mobilenumber']; 
    $email = $_REQUEST['emailaddress']; 
    $block = $_REQUEST['blocknumber']; 
    $lot = $_REQUEST['lotnumber']; 
    $street = $_REQUEST['street']; 
    $barangay = $_REQUEST['barangay']; 
    $city = $_REQUEST['city']; 
    $province = $_REQUEST['province']; 
    $country = $_REQUEST['country'];
    $status = "Pending";


    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    mysqli_close($conn);

    header("Location: dashboard.php");
?>
