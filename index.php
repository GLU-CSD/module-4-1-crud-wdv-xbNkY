<?php
    include('core/header.php');
    include('functions/products.php');

    $products = getProducts();
    $product_count = 0; // Prevents overflow
?>
<div class="row">
    <div class="col">
        <h1 class="text-center">Welcome</h1>
    </div>
</div>

<div class="row mb-3">
   <div class="col">
        <img src="https://www.bij12.nl/wp-content/uploads/2023/11/AERIUS-illustratie-header-klein-1920x400.jpg" class="img-fluid" alt="">
   </div>
</div>
<div class="row">
<?php 
        
        foreach($products as $item){

            if($product_count >=3){
                break;
            }

            $product_id = $item['id'];
            $product_name = $item['product_name'];
            $product_brand = $item['product_brand'];
            $product_img1 = $item['product_img1'];
            $product_price = $item['product_price'];
            
            ?>
    <div class="col-4 mb-3">
        <div class="card w-100">
            <img src="./assets/img/<?php echo $product_img1 ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php  echo $product_brand . " " . $product_name ?></h5>
                <p class="card-text">&euro; <?php echo $product_price ?></p>
                <a href="product.php" class="btn btn-primary">+</a>
            </div>
        </div>
        </div>         
            <?php
                $product_count++;
        };
            ?>
    <div class="col-12 text-center">
        <a href="products.php" class="btn btn-info">View more</a>
    </div>    
</div>
<?php
    include('core/footer.php');
?>