<?php
require_once('connection.php');

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactno']);
    $typeofevent = mysqli_real_escape_string($con, $_POST['typeofevent']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $venue = mysqli_real_escape_string($con, $_POST['venue']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $noofguests = mysqli_real_escape_string($con, $_POST['noofguests']);

    if (empty($email) || empty($contactno) || empty($typeofevent) || empty($date) || empty($venue) || empty($food) || empty($noofguests)) {
        echo '<script>alert("Please fill all the fields")</script>';
    } else {
        $sql_insert = "INSERT INTO users (email, contactno, typeofevent, date, venue, food, noofguests) 
                        VALUES ('$email', '$contactno', '$typeofevent', '$date', '$venue', '$food', '$noofguests')";
        $result_insert = mysqli_query($con, $sql_insert);

        if ($result_insert) {
            echo '<script>alert("Form submitted successfully")</script>';
        } else {
            echo '<script>alert("Error submitting form. Please check the connection")</script>';
        }
    }
}
?>
