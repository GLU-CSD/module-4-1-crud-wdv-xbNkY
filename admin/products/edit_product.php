<?php
include('../../core/header.php');
include('../../functions/products.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = getProductById($product_id);
    // var_dump($product);
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Item
                    <a href="index.php" class="btn btn-danger float-end">Return</a>
                </h4>
            </div>
            <div class="card-body">
                <?php if (isset($product) && $product): ?>
                    <form action="dbpush.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" value="<?= $product['product_name']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Brand</label>
                            <input type="text" name="brand" value="<?= $product['product_brand']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Size</label>
                            <input type="text" name="size" value="<?= $product['product_size']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Resolution</label>
                            <input type="text" name="resolution" value="<?= $product['product_resolution']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Refreshrate</label>
                            <input type="text" name="refreshrate" value="<?= $product['product_refreshrate']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Price</label>
                            <input type="text" name="price" value="<?= $product['product_price']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?= $product['product_about']; ?></textarea>
                        </div>
                        <div class="mb-3">
                        <div class="mb-3">
                                <label for="basic-url" class="form-label">Main image</label>
                                <input type="file" class="form-control" name="product_img1">
                                <label for="basic-url" class="form-label">Second Image</label>
                                <input type="file" class="form-control" name="product_img2">
                                <label for="basic-url" class="form-label">Third Image</label>
                                <input type="file" class="form-control" name="product_img3">
                            </div>
                        
                            <button type="submit" name="update_product" class="btn btn-primary">Edit Product</button>
                        </div>
                    </form>
                <?php else: ?>
                    <h4>No Product found</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
include('../../core/footer.php');
?>
