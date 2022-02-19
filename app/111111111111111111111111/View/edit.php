<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Edit Users Info</title>
</head>
<body>

<main class="dash-content">
<div class="container-fluid">

    <h1 class="dash-title">Trang chủ / Tài khoản / Sửa</h1>
    <div class="row">
        <div class="col-xl-12">

            <div class="card easion-card">

                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="easion-card-title">Thông tin tài khoản</div>
                </div>

                <div class="card-body">
                                <?= view('message/message'); ?>
                    <form action="<?= base_url();?>/admin/user/update" method="post">

                        <input name="id" value="<?= $users['id'] ?>" hidden>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">Email</label>
                                <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required value="<?= $users['email'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Tên hiển thị</label>
                            <input name="name" type="text" class="form-control" id="inputAddress" placeholder="Tên hiển thị người dùng" required value="<?= $users['name'] ?>">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Mat khau</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Nhap vao mat khau" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password-comfirm">Xac nhan mat khau</label>
                                <input name="password_comfirm" type="password" class="form-control" id="password-comfirm" placeholder="Xac nhan lai mat khau" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="custom-control custom-checkbox">
                                <input name="change_password" type="checkbox" class="custom-control-input" id="change-password">
                                <label for="change-password" class="custom-change-label">Thay doi mat khau</label>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Cap nhat</button>
                        <button class="btn btn-secondary" type="reset" id="btn-reset-edit-user">Nhap lai</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url();?>/public/homepage/js/event.js"></script>
</body>
</html>