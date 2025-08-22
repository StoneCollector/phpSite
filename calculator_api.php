<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_num  = isset($_POST['first_num']) ? floatval($_POST['first_num']) : 0;
    $second_num = isset($_POST['second_num']) ? floatval($_POST['second_num']) : 0;
    $operator   = isset($_POST['operator'])   ? $_POST['operator'] : '';
    $result     = null;

    switch($operator) {
        case "add":
            $result = $first_num + $second_num;
            break;
        case "subtract":
            $result = $first_num - $second_num;
            break;
        case "multiply":
            $result = $first_num * $second_num;
            break;
        case "divide":
            $result = ($second_num != 0) ? $first_num / $second_num : "undefined";
            break;
        default:
            $result = "invalid operator";
            break;
    }
    echo json_encode(['result' => $result]);
    exit;
}
echo json_encode(['error' => 'Invalid request']);
