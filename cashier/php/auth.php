<?php
// php/auth.php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $conn->real_escape_string($_POST['employee_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $role = $conn->real_escape_string($_POST['role']);

    $sql = "SELECT * FROM users WHERE employee_id=? AND name=? AND role=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $employee_id, $name, $role);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        if ($row['role'] === 'manager') {
            header('Location: ../pages/dashboard_manager.php');
        } else {
            header('Location: ../pages/dashboard_cashier.php');
        }
        exit;
    } else {
        echo "<script>alert('Invalid credentials');location.href='../pages/login.php';</script>";
    }
}
?>
