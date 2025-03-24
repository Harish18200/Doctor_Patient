<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_POST['expenses'])) {
    $date = isset($_POST['date']) ? $_POST['date'] : "null";
    $eb_bill = isset($_POST['eb_bill']) ? $_POST['eb_bill'] : 0;
    $physio_expenses = isset($_POST['physio_expenses']) ? $_POST['physio_expenses'] : 0;
    $salary = isset($_POST['salary']) ? $_POST['salary'] : 0;
    $tv = isset($_POST['tv']) ? $_POST['tv'] : 0;
    $tea = isset($_POST['tea']) ? $_POST['tea'] : 0;
    $phone_bill = isset($_POST['phone_bill']) ? $_POST['phone_bill'] : 0;
    $food = isset($_POST['food']) ? $_POST['food'] : 0;
    $biscuit = isset($_POST['biscuit']) ? $_POST['biscuit'] : 0;
    $cool_drinks = isset($_POST['cool_drinks']) ? $_POST['cool_drinks'] : 0;
    $service = isset($_POST['service']) ? $_POST['service'] : 0;
    $work = isset($_POST['work']) ? $_POST['work'] : 0;
    $milk = isset($_POST['milk']) ? $_POST['milk'] : 0;

    $query = "INSERT INTO expenses (date, eb_bill, physio_expenses, salary, tv, tea, phone_bill, food, biscuit, cool_drinks, service, work, milk) 
            VALUES ('$date', '$eb_bill', '$physio_expenses', '$salary', '$tv', '$tea', '$phone_bill', '$food', '$biscuit', '$cool_drinks', '$service', '$work', '$milk')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo json_encode(["success" => true, "message" => "Expense added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error adding expense: " . mysqli_error($con)]);
    }

    exit;
}
