<?php
require_once 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $updateQuery = "UPDATE login_data SET stat = 'Accepted' WHERE id = $id";
    mysqli_query($conn, $updateQuery);
}
if (isset($_GET['id1'])) {
    $id = $_GET['id1'];
    $updateQuery = "UPDATE apply SET stat = 'Accepted' WHERE id = $id";
    mysqli_query($conn, $updateQuery);
}
header("Location: table-admin.php");
exit();
?>
