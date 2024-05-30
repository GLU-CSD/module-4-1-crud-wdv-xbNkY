<?php

// include("./core/db_connect.php");

// // Selecteer alle producten (simpele vorm)
// $sql = "SELECT * FROM producten";

// $result = mysqli_query($con, "SELECT * FROM products");

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row["product_name"]."<br>";
//         echo $row["product_price"]."<br>";
//     }
// }else{
//     echo "Geen resultaten";
// }

// echo "__________<br><br><br>";

// // Selecteer alle producten (betere vorm)
// $sqli_query = $con->query("SELECT product_name,product_price FROM products;");
// if($sqli_query === false) {
//     echo mysqli_error($con);
// } else {
//     if($sqli_query->num_rows > 0){
//         while($row = $sqli_query->fetch_assoc()){
//             echo $row["product_name"]."<br>";
//             echo $row["product_price"]."<br>";
//         }
//     } else {
//         echo "Geen resultaten";
//     }
//     $sqli_query->close();
// }


// echo "__________<br><br><br>";


// $sqli_prepare = $con->prepare("SELECT product_name,product_price FROM products;");
// if ($sqli_prepare === false) {
//     echo mysqli_error($con);
// } else{
//     $sqli_prepare->bind_result($product_name,$product_price);
//     if ($sqli_prepare->execute()) {
        
//         while($sqli_prepare->fetch()){
//             echo $product_name."<br>";
//             echo $product_price."<br>";
//         }
//     }
// }
// $sqli_prepare->close();



/*
-- Voeg product 11 toe
INSERT INTO products (product_name, product_price, product_photo, product_description)
VALUES ('Wit T-shirt', 14.95, 'https://www.pexels.com/search/t-shirt/', 'Basic wit')

*/


function getProducts($limit = ""){
    global $con;
    $array = array();

    if(!empty($limit)) $limit = " LIMIT " . $limit; 
    $sqli_prepare = $con->prepare("SELECT product_id,product_name,product_brand,product_size,product_resolution,product_refreshrate,product_price,product_img1,product_img2,product_img3,product_about FROM products".$limit.";");
    if ($sqli_prepare === false) {
        echo mysqli_error($con);
    } else{
        if ($sqli_prepare->execute()) {
            $sqli_prepare->bind_result($product_id,$product_name,$product_brand,$product_size,$product_resolution,$product_refreshrate,$product_price,$product_img1,$product_img2,$product_img3,$product_about);
            while($sqli_prepare->fetch()){

                $array[$product_id] =[
                    'product_id' => $product_id,    
                    'product_name' => $product_name,
                    'product_brand' => $product_brand,
                    'product_size' => $product_size,
                    'product_resolution' => $product_resolution,
                    'product_refreshrate' => $product_refreshrate,
                    'product_price' => $product_price,
                    'product_img1' => $product_img1,
                    'product_img2' => $product_img2,
                    'product_img3' => $product_img3,
                    'product_about' => $product_about,

                ];

            }
        }
    }
    $sqli_prepare->close();
    

    $array2 = shuffle($array);
    return $array;

};

function getProductById($product_id) {
    global $con;
    $product = null;

    $sqli_prepare = $con->prepare("SELECT product_id, product_name, product_brand, product_size, product_resolution, product_refreshrate, product_price, product_img1, product_img2, product_img3, product_about FROM products WHERE product_id = ?");
    if ($sqli_prepare === false) {
        echo mysqli_error($con);
    } else {
        $sqli_prepare->bind_param('i', $product_id);
        if ($sqli_prepare->execute()) {
            $sqli_prepare->bind_result($id, $name, $brand, $size, $resolution, $refreshrate, $price, $img1, $img2, $img3, $about);
            if ($sqli_prepare->fetch()) {
                $product = [
                    'product_id' => $id,
                    'product_name' => $name,
                    'product_brand' => $brand,
                    'product_size' => $size,
                    'product_resolution' => $resolution,
                    'product_refreshrate' => $refreshrate,
                    'product_price' => $price,
                    'product_img1' => $img1,
                    'product_img2' => $img2,
                    'product_img3' => $img3,
                    'product_about' => $about
                ];
            }
        }
        $sqli_prepare->close();
    }

    return $product;
}

?>