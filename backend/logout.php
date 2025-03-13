<?php
session_start();

if (!isset($_GET['confirm'])) {
    echo "<script>
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = 'logout.php?confirm=yes';
        } else {
            window.location.href = '../index.php';
        }
    </script>";
} else {
    if ($_GET['confirm'] === 'yes') {
        session_destroy();
        header("location: ../frontend/views/login.php");
        exit();
    } else {
        header("Location: ../index.php");
        exit();
    }
}
