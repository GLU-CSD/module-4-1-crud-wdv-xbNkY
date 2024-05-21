    <?php
        include('core/header.php');
        include('functions/products.php');

        $products = getProducts();
    ?>
    <div class="row">
        <?php 
        
            foreach($products as $item){
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
                    <a href="product.php" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            </div>         
                <?php
            };
                ?>
</div>
    <?php
        include('core/footer.php');
    ?>