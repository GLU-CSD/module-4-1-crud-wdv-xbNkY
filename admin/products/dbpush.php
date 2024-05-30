<?php
include($_SERVER['DOCUMENT_ROOT'].'/Webshop-module4/core/db_connect.php');

// Debugging: Output all POST data
echo '<pre>';
print_r($_POST);
echo '</pre>';

if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['name'] ?? null;
    $product_brand = $_POST['brand'] ?? null;
    $product_size = $_POST['size'] ?? null;
    $product_resolution = $_POST['resolution'] ?? null;
    $product_refreshrate = $_POST['refreshrate'] ?? null;
    $product_price = $_POST['price'] ?? null;
    $product_about = $_POST['description'] ?? null;

    $target_directory = $_SERVER['DOCUMENT_ROOT'] . '/Webshop-module4/admin/assets/upload/';

    // Move the uploaded files
    $product_img1 = $_FILES["product_img1"]["name"];
    $target_file1 = $target_directory . basename($product_img1);
    if (move_uploaded_file($_FILES["product_img1"]["tmp_name"], $target_file1)) {
        echo "File 1 uploaded successfully.";
    } else {
        echo "Error uploading file 1.";
    }
    
    $product_img2 = $_FILES["product_img2"]["name"];
    $target_file2 = $target_directory . basename($product_img2);
    if (move_uploaded_file($_FILES["product_img2"]["tmp_name"], $target_file2)) {
        echo "File 2 uploaded successfully.";
    } else {
        echo "Error uploading file 2.";
    }
    
    $product_img3 = $_FILES["product_img3"]["name"];
    $target_file3 = $target_directory . basename($product_img3);
    if (move_uploaded_file($_FILES["product_img3"]["tmp_name"], $target_file3)) {
        echo "File 3 uploaded successfully.";
    } else {
        echo "Error uploading file 3.";
    }

    // Check if the product exists
    $check_sql = "SELECT COUNT(*) FROM products WHERE product_id = ?";
    $check_liqry = $con->prepare($check_sql);
    if ($check_liqry === false) {
        die("Prepare failed: " . mysqli_error($con));
    } else {
        $check_liqry->bind_param("i", $product_id);
        $check_liqry->execute();
        $check_liqry->bind_result($count);
        $check_liqry->fetch();
        $check_liqry->close();

        if ($count == 0) {
            die("Product with ID $product_id does not exist.");
        }
    }

    // Prepare the update SQL statement
    $sql = "UPDATE products 
            SET product_name = ?, 
                product_brand = ?, 
                product_size = ?, 
                product_resolution = ?, 
                product_refreshrate = ?, 
                product_price = ?, 
                product_img1 = ?, 
                product_img2 = ?, 
                product_img3 = ?, 
                product_about = ? 
            WHERE product_id = ?";

    $liqry = $con->prepare($sql);

    if ($liqry === false) {
        die("Prepare failed: " . mysqli_error($con));
    } else {
        $liqry->bind_param("sssssdssssi", $product_name, $product_brand, $product_size, $product_resolution, $product_refreshrate, $product_price, $product_img1, $product_img2, $product_img3, $product_about, $product_id);

        if ($liqry->execute()) {
            $_SESSION['message'] = "Product Updated Successfully";
        } else {
            $_SESSION['message'] = "Product Failed to be updated: " . $liqry->error;
        } 

        $liqry->close();
    }
    header("Location: index.php");
    exit(0);
}

if (isset($_POST['save_product'])) {
    $product_name = $_POST['name'] ?? null;
    $product_brand = $_POST['brand'] ?? null;
    $product_size = $_POST['size'] ?? null;
    $product_resolution = $_POST['resolution'] ?? null;
    $product_refreshrate = $_POST['refreshrate'] ?? null;
    $product_price = $_POST['price'] ?? null;
    $product_about = $_POST['description'] ?? null;


    $target_directory = $_SERVER['DOCUMENT_ROOT'] . '/Webshop-module4/admin/assets/upload/';

    // Move the uploaded files
    $product_img1 = $_FILES["product_img1"]["name"];
    $target_file1 = $target_directory . basename($product_img1);
    if (move_uploaded_file($_FILES["product_img1"]["tmp_name"], $target_file1)) {
        echo "File 1 uploaded successfully.";
    } else {
        echo "Error uploading file 1.";
    }
    
    $product_img2 = $_FILES["product_img2"]["name"];
    $target_file2 = $target_directory . basename($product_img2);
    if (move_uploaded_file($_FILES["product_img2"]["tmp_name"], $target_file2)) {
        echo "File 2 uploaded successfully.";
    } else {
        echo "Error uploading file 2.";
    }
    
    $product_img3 = $_FILES["product_img3"]["name"];
    $target_file3 = $target_directory . basename($product_img3);
    if (move_uploaded_file($_FILES["product_img3"]["tmp_name"], $target_file3)) {
        echo "File 3 uploaded successfully.";
    } else {
        echo "Error uploading file 3.";
    }

    $sql = "INSERT INTO products (product_name, product_brand, product_size, product_resolution, product_refreshrate, product_price, product_img1, product_img2, product_img3, product_about) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $liqry = $con->prepare($sql);

    if ($liqry === false) {
        die("Prepare failed: " . mysqli_error($con));
    } else {
        $liqry->bind_param("sssssdssss", $product_name, $product_brand, $product_size, $product_resolution, $product_refreshrate, $product_price, $product_img1, $product_img2, $product_img3, $product_about);

        if ($liqry->execute()) {
            $_SESSION['message'] = "Product Created Successfully";
        } else {
            $_SESSION['message'] = "Product Failed to be created: " . $liqry->error;
        } 

        $liqry->close();
    }
    header("Location: index.php");
    exit(0);
}
?>
