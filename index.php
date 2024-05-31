<?php
include('core/header.php');
include('functions/products.php');

$products = getProducts(3);
?>

<div class="row">
    <div class="col">
        <h1 class="text-center">bonky.dev</h1>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <img src="https://www.bij12.nl/wp-content/uploads/2023/11/AERIUS-illustratie-header-klein-1920x400.jpg" class="img-fluid" alt="">
    </div>
</div>

<div class="row">
    <?php foreach ($products as $item): ?>
        <div class="col-4 mb-3">
            <div class="card w-100">
                <img src="./admin/assets/upload/<?php echo $item['product_img1']; ?>" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['product_brand'] . " " . $item['product_name'] . " " . $item['product_size']; ?></h5>
                    <p class="card-text">&euro; <?php echo $item['product_price']; ?></p>
                    <a href="product.php?id=<?php echo $item['product_id']; ?>" class="btn btn-primary">+</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="col-12 text-center">
        <a href="products.php" class="btn btn-info">View more</a>
    </div>
</div>

<?php
include('core/footer.php');
?>