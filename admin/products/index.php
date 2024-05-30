<?php
    include('../../core/header.php');
    include('../../functions/products.php');

    $products = getProducts();
?>
<div class="row">


<table class="table">
    <tr>
        <th><a href="add_product.php" class="btn btn-success">Add new</th>
        <th></th>
        <th>ID</th>
        <th>Serial</th>
        <th>Brand</th>
        <th>Size (")</th>
        <th>Resolution</th>
        <th>Refreshrate</th>
        <th>Price</th>
        <th>Image 1</th>
        <th>Image 2</th>
        <th>Image 3</th>
        <th>Description</th>

    </tr>
<?php
    $sql = "SELECT product_id,product_name,product_brand,product_size,product_resolution,product_refreshrate,product_price,product_img1,product_img2,product_img3,product_about FROM products";
    $liqry = $con->prepare($sql);
    if($liqry === false) {
        echo mysqli_error($con);
    } else{
        // $liqry->bind_param('s',$email);
        $liqry->bind_result($product_id,$product_name,$product_brand,$product_size,$product_resolution,$product_refreshrate,$product_price,$product_img1,$product_img2,$product_img3,$product_about);
        if($liqry->execute()){
            $liqry->store_result();
            while($liqry->fetch()){
                ?>
                <tr>
                    <td>
                        <a href="edit_product.php?product_id=<?php echo $product_id;?>" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="delete_product.php?product_id=<?php echo $product_id;?>" class="btn btn-danger">Delete</a>
                    </td>
                    <td><?php echo $product_id?></td>
                    <td><?php echo $product_name?></td>
                    <td><?php echo $product_brand?></td>
                    <td><?php echo $product_size?></td>
                    <td><?php echo $product_resolution?></td>
                    <td><?php echo $product_refreshrate?></td>
                    <td><?php echo $product_price?></td>
                    <td><img src="../assets/upload/<?php echo $product_img1; ?>" class="card-img-top" alt="Product Image" style="width: 125px; height: 100px;"></td>
                    <td><img src="../assets/upload/<?php echo $product_img2; ?>" class="card-img-top" alt="Product Image" style="width: 125x; height: 100px;"></td>
                    <td><img src="../assets/upload/<?php echo $product_img3; ?>" class="card-img-top" alt="Product Image" style="width: 125px; height: 100px;"></td>
                    <td><?php echo $product_about?></td>
                </tr>
                <?php
            }
        }
        $liqry->close();
    }
?>
</table>
</div>
<?php
    include('../core/footer.php');
?>