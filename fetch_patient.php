<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (!$con) {
    die(json_encode(["success" => false, "message" => "Database connection failed: " . mysqli_connect_error()]));
}

if (!isset($_POST['patient_id']) || empty($_POST['patient_id'])) {
    die(json_encode(["success" => false, "message" => "Invalid patient ID"]));
}

$patient_id = $_POST['patient_id'];

$query = "SELECT pid,fname, lname, email, contact, dob, gender, password, address FROM patreg WHERE pid = ?";
$stmt = $con->prepare($query);

if (!$stmt) {
    die(json_encode(["success" => false, "message" => "Query preparation failed: " . $con->error]));
}

$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode(["success" => true, "data" => $data]);
} else {
    echo json_encode(["success" => false, "message" => "No data found"]);
}

$stmt->close();
$con->close();
?>
