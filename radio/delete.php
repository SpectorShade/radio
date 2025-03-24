<?php
include 'config.php';

if (isset($_GET['table'], $_GET['id'])) {
    $table = $conexion->real_escape_string($_GET['table']);
    $id = (int)$_GET['id'];

    // Confirm the record exists before deleting
    $checkStmt = $conexion->prepare("SELECT * FROM $table WHERE ID = ?");
    $checkStmt->bind_param("i", $id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Proceed with deletion
        $stmt = $conexion->prepare("DELETE FROM $table WHERE ID = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Record deleted successfully!'); window.location.href='read.php?table=$table';</script>";
        } else {
            echo "<script>alert('Error deleting record.'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Record not found.'); window.history.back();</script>";
    }

    $checkStmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>
