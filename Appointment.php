<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['appointment'])) {

    $pname  = $_POST['pname'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $date   = $_POST['date'];
    $reason = $_POST['reason'];

    $pname_h  = hash("sha256", $pname);
    $email_h  = hash("sha256", $email);
    $phone_h  = hash("sha256", $phone);
    $date_h   = hash("sha256", $date);
    $reason_h = hash("sha256", $reason);

    $conn = mysqli_connect("localhost", "root", "Luka0614", "week13DB");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO Appointment (pname, email, phone, date, reason)
            VALUES ('$pname_h', '$email_h', '$phone_h', '$date_h', '$reason_h')";

    mysqli_query($conn, $sql);

    echo "Appointment saved (hashed).";
}
?>
