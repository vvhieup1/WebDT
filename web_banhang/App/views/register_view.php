<div class="container">
    <h1>Registration</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Tên đầy đủ:</label>
            <input type="text" class="form-control" name="name-reg" id="name-reg" placeholder="Nhập tên đầy đủ">
        </div>
        <div class="form-group">
            <label for="email">Địa chỉ email:</label>
            <input type="email" class="form-control" name="email-reg" id="email-reg" placeholder="nhập email của bạn">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" name="password-reg" id="password-reg"
                   placeholder="vui lòng nhập mật khẩu">
        </div>

        <div class="form-group">
            <label for="role">Vai trò:</label>
            <select class="form-control" name="role-reg" id="role-reg">
                <option>Người mua</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success">
        </div>

    </form>
    <?php extract($data); ?>
    <?php if ($register_status == "access_granted") { ?>
        <p style="color:green">đăng kí thành công</p>
    <?php } elseif ($register_status == "access_denied") { ?>
        <p style="color:red">Tài khoản hoặc mật khẩu sai</p>
    <?php } ?>


</div>
