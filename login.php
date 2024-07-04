<?php
session_start();

$errmsg_arr = array();
$errflag = false;

$mysqli = new mysqli('localhost', 'root', '', 'model');

if ($mysqli->connect_error) {
    die('Failed to connect to server: ' . $mysqli->connect_error);
}

function clean($str, $mysqli)
{
    $str = trim($str);
    $str = stripslashes($str); // Use stripslashes directly
    return $mysqli->real_escape_string($str);
}

$login = clean($_POST['username'], $mysqli);
$password = clean($_POST['password'], $mysqli);

if ($login == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
}

$qry = "SELECT * FROM user WHERE username=? AND password=?";
$stmt = $mysqli->prepare($qry);

if ($stmt) {
    $stmt->bind_param('ss', $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows > 0) {
            session_regenerate_id();
            $member = $result->fetch_assoc();
            $_SESSION['SESS_MEMBER_ID'] = $member['id'];
            $_SESSION['SESS_FIRST_NAME'] = $member['name'];
            $_SESSION['SESS_LAST_NAME'] = $member['position'];
            session_write_close();
            header("location: main/index.php");
            exit();
        } else {
            header("location: index.php");
            exit();
        }
    } else {
        die("Query failed");
    }

    $stmt->close();
}
