<?php
include('core/header.php');
include('functions/products.php');


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = $_GET['id'];
    $product = getProductById($product_id);

    if ($product) {
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4">
                                    <img id="main-image" src="./assets/img/<?php echo $product['product_img1']; ?>" width="250" />
                                </div>
                                <div class="thumbnail text-center">
                                    <img src="./assets/img/<?php echo $product['product_img2']; ?>" width="70">
                                    <img src="./assets/img/<?php echo $product['product_img3']; ?>" width="70">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="mt-4 mb-3">
                                    <span class="text-uppercase text-muted brand"><?php echo $product['product_brand']; ?></span>
                                    <h5 class="text-uppercase"><?php echo $product['product_name']; ?></h5>
                                    <div class="price d-flex flex-row align-items-center">
                                        <span class="act-price">&euro; <?php echo $product['product_price']; ?></span>
                                    </div>
                                </div>
                                <p class="about"><?php echo $product['product_size'] . " " . $product['product_resolution'] . " " . $product['product_refreshrate']; ?></p>
                                <div class="sizes mt-5"></div>
                                <div class="cart mt-4 align-items-center">
                                    <button class="btn btn-danger text-uppercase mr-2 px-4">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<p>Product not found.</p>";
    }
} else {
    echo "<p>Invalid product ID.</p>";
}

include('core/footer.php');
?>