<?php
include($_SERVER['DOCUMENT_ROOT'].'/Webshop-module4/core/db_connect.php');


if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];

    
    $stmt = $con->prepare("DELETE FROM products WHERE product_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $product_id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Product deleted successfully";
        } else {
            $_SESSION['message'] = "Product deletion failed";
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Error: " . $con->error;
    }
} else {
    $_SESSION['message'] = "No product ID specified";
}

// Redirect to the product list page
header("Location: index.php");
exit(0);
?>