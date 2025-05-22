<div class="container my-5">
<!-- Slider sản phẩm -->
<div id="productCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="app/anh/banner1.jpg" class="d-block w-100"style="height: 400px"; object-fit:"cover"; alt="Banner 1">
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="app/anh/banner2.png" class="d-block w-100"sstyle="height: 400px"; object-fit:"cover";" alt="Banner 2">
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="app/anh/banner3.jpg" class="d-block w-100"style="height: 400px"; object-fit:"cover"; alt="Banner 3">
        </div>
    </div>

    <!-- Nút điều hướng -->
    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Trước</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Tiếp</span>
    </button>
</div>
<h1 class="text-center mb-4">Danh Sách Sản Phẩm</h1>
    <!-- Thông báo đăng nhập -->
    <?php if (!isset($_SESSION["logged_in"])): ?>
        <div class="alert alert-info text-center" role="alert">
            <strong>Xin chào!</strong> Hãy <a href="login" class="alert-link">đăng nhập</a> hoặc <a href="register" class="alert-link">đăng ký</a> để mua hàng.
        </div>
    <?php endif; ?>

    <!-- Danh sách sản phẩm -->
    <div class="row">
        <?php foreach ($data as $product): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <!-- Hình ảnh sản phẩm -->
                    <img src="<?php echo $product['picture']; ?>" class="card-img-top img-fluid" alt="Hình sản phẩm">
                    <!-- Chi tiết sản phẩm -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center"><?php echo $product['name']; ?></h5>
                        <p class="card-text text-center text-muted">Giá: $<?php echo $product['price']; ?></p>
                        <p class="card-text text-center <?php echo $product['available'] == 'Y' ? 'text-success' : 'text-danger'; ?>">
                            <?php echo $product['available'] == 'Y' ? 'Còn hàng' : 'Hết hàng'; ?>
                        </p>
                        <div class="mt-auto text-center">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                                <button class="btn btn-<?php echo $product['available'] == 'Y' ? 'primary' : 'secondary disabled'; ?> btn-sm add-to-cart-btn"
                                        data-product-id="<?php echo $product['item_id']; ?>"
                                    <?php echo $product['available'] == 'Y' ? '' : 'disabled'; ?>>
                                    <?php echo $product['available'] == 'Y' ? 'Thêm vào giỏ' : 'Hết hàng'; ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

        addToCartButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log('Thêm vào giỏ: ', xhr.responseText);
                    }
                };
                xhr.send('product_id=' + productId);
            });
        });
    });
</script>
