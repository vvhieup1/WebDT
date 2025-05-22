<div class="container mt-5">
    <h1 class="text-center mb-4">Hồ Sơ Cá Nhân</h1>

    <div class="card mb-5 mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h5 class="card-title">Xin chào, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h5>
            <p class="card-text">Email: <?php echo htmlspecialchars($_SESSION['login']); ?></p>
            <p class="card-text">Vai trò: Người mua</p>
        </div>
    </div>

    <h2 class="text-center mb-4">Lịch Sử Đơn Hàng</h2>

    <?php
    if (!empty($data)) {
        $currentOrderId = null;

        foreach ($data as $order) {
            if ($currentOrderId !== $order['order_id']) {
                if ($currentOrderId !== null) {
                    echo '<p class="mb-3"><strong>Total:</strong> $' . number_format($orderTotal, 2) . '</p>';
                    echo '</div>';
                }
                echo '<div class="order mb-4">';
                echo '<h3>Order #' . $order['order_id'] . ' from ' . date('d.m.Y', strtotime($order['order_date'])) . '</h3>';
                echo '<p><strong>Status:</strong> ' . $order['order_status'] . '</p>';
                $currentOrderId = $order['order_id'];
                $orderTotal = 0;
            }

            echo '<p>' . $order['item_name'] . ' - $' . number_format($order['item_price'], 2) . ' x ' . $order['item_amount'] . '</p>';
            $orderTotal += $order['item_price'] * $order['item_amount'];
        }

        if ($currentOrderId !== null) {
            echo '<p class="mb-3"><strong>Order Total:</strong> $' . number_format($orderTotal, 2) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>You have not ordered anything yet</p>';
    }
    ?>
</div>