<?php
    include('../../core/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>New Item
                    <a href="index.php" class="btn btn-danger">Return</a>
                </h4>
                <div class="card-body">
                    <form action="dbpush.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Brand</label>
                            <input type="text" name="brand" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Size</label>
                            <input type="text" name="size" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Resolution</label>
                            <input type="text" name="resolution" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Refreshrate</label>
                            <input type="text" name="refreshrate" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Main image</label>
                                <input type="file" class="form-control" name="product_img1">
                                <label for="basic-url" class="form-label">Second Image</label>
                                <input type="file" class="form-control" name="product_img2">
                                <label for="basic-url" class="form-label">Third Image</label>
                                <input type="file" class="form-control" name="product_img3">
                            </div>
                        <div class="mb-3">
                            <button type="submit" name="save_product" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('../../core/footer.php');
?>