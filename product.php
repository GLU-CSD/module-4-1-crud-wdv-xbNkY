<?php
        include('core/header.php');
        include('functions/products.php');

        $products = getProducts();
    ?>
    
    <div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="row">
            <?php 
        
        foreach($products as $item){
            $product_id = $item['id'];
            $product_name = $item['product_name'];
            $product_brand = $item['product_brand'];
            $product_resolution = $item['product_resolution'];
            $product_refreshrate = $item['product_refreshrate'];
            $product_price = $item['product_price'];
            $product_img1 = $item['product_img1'];
            $product_img2 = $item['product_img2'];
            $product_img3 = $item['product_img3'];
            $product_about = $item['product_about'];
            $product_size = $item['product_size'];
        }
        ?>
                <div class="col-md-6">
                    <div class="images p-3">
                        <div class="text-center p-4">
                            <img id="main-image" src="./assets/img/<?php echo $product_img1 ?>" width="250" />
                        </div>
                        <div class="thumbnail text-center">
                            <img src="./assets/img/<?php echo $product_img2 ?>" width="70">
                            <img src="./assets/img/<?php echo $product_img3 ?>" width="70">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product p-4">
                        
                        <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $product_brand ?></span>
                            <h5 class="text-uppercase"><?php echo $product_name ?></h5>
                            <div class="price d-flex flex-row align-items-center">
                                <span class="act-price">&euro; <?php echo $product_price ?></span>
                            </div>
                        </div>
                        <p class="about"><?php echo $product_size . " " . $product_resolution . " " . $product_refreshrate ?></p>
                        <div class="sizes mt-5">

                        <div class="cart mt-4 align-items-center">
                            <button class="btn btn-danger text-uppercase mr-2 px-4">
                                Add to cart
                            </button>  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php
include('core/footer.php');
?>

