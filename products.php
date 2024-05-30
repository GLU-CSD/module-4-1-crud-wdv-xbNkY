<?php
include('core/header.php');
include('functions/products.php');

$products = getProducts();
?>

<div class="row">
    <?php foreach($products as $item): ?>
        <div class="col-4 mb-3">
            <div class="card w-100">
                <div class="d-flex justify-content-center">
                    <img id="main-image" src="./admin/assets/upload/<?php echo $item['product_img1']; ?>" class="card-img-top" alt="Product Image" style="width: 400px; height: 200px; object-fit: contain; margin-top: 15px;">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['product_brand'] . " " . $item['product_name']; ?></h5>
                    <p class="card-text">&euro; <?php echo $item['product_price']; ?></p>
                    <a href="product.php?id=<?php echo $item['product_id']; ?>" class="btn btn-primary">+</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
include('core/footer.php');
?>
