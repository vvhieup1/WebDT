<div class="container mt-5">
    <h1 class="text-center mb-4">Thông Tin Cá Nhân</h1>
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h5 class="card-title">Xin chào, <?php echo $data['name']; ?>!</h5>
            <p class="card-text">Email: <?php echo $data['email']; ?></p>
            <p class="card-text">Ngày đăng ký: <?php echo $data['registration_date']; ?></p>
            <p class="card-text">Vai trò: <?php echo $data['role'] == 1 ? 'Người quản trị' : 'Người dùng'; ?></p>
            <a href="edit-profile" class="btn btn-primary">Chỉnh sửa thông tin</a>
        </div>
    </div>
</div>
