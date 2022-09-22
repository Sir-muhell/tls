<?php
$con = mysqli_connect("localhost", "scribetr_reg", "scriberpass5050", "scribetr_reg");
function query($query)
{
    global $con;

    return mysqli_query($con, $query);
}

function insert()
{
    global $con;

    return mysqli_insert_id($con);
}

function confirm($result)
{
    global $con;
    if (!$result) {

        die("QUERY FAILED" . mysqli_error($con));
    }
}

function row_count($result)
{

    global $con;

    return mysqli_num_rows($result);
}

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function email_exist($email)
{

    $sql = "SELECT * FROM register WHERE `email` = '$email'";
    $result = query($sql);

    if (row_count($result) == 1) {

        return true;

    } else {

        return false;
    }
}

function s_email_exist($email)
{

    $sql = "SELECT * FROM subscribe WHERE `email` = '$email'";
    $result = query($sql);

    if (row_count($result) == 1) {

        return true;

    } else {

        return false;
    }
}

//Register
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['company']) && isset($_POST['role']) && isset($_POST['l_name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $l_name = $_POST['l_name'];
    $role = $_POST['role'];
    if (email_exist($email)) {

        echo "You already Registered!";
    } else {

        // Insert article into db
        $sqlt = "INSERT INTO register(`name`, `l_name`, `email`, `company`, `role`)";
        $sqlt .= " VALUES('$name', '$l_name', '$email', '$company', '$role')";
        $result = query($sqlt);
        if ($result != 1) {
            echo "Error! Please Consult Administrator.";
        } else {
            echo "Thank you for Registering!  ";
            echo ' Stay Glued to your Mailbox';
        }
    }
}

//Subscribe
if (isset($_POST['s_mail'])) {
    $mail = $_POST['s_mail'];

    if (s_email_exist($mail)) {

        echo "You already Subscribed";
    } else {

        // Insert article into db
        $sqlts = "INSERT INTO subscribe(`email`)";
        $sqlts .= " VALUES('$mail')";
        $result = query($sqlts);
        if ($result != 1) {
            echo "Error! Please Consult Administrator.";
        } else {
            echo "Thank you Subscribing! ";
        }
    }
}
