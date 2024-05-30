<?php
include('core/header.php');
include('functions/products.php');

$products = getProducts();
?>

<div class="row">
    <?php foreach($products as $item): ?>
        <div class="col-4 mb-3">
            <div class="card w-100">
                <img src="./assets/img/<?php echo $item['product_img1']; ?>" class="card-img-top" alt="...">
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