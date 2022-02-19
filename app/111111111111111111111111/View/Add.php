<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Testv</title>
</head>
<body>

    <?= view('message/message') ?>
    
    <form action="<?= base_url() ?>/admin/user/create" method="post">
        <div class="form-group">
            <label>Name:</label>
            <input value="<?= old('name') ?>" type="test" name="name" class="form-control" >
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input value="<?= old('email') ?>" type="email" name="email" class="form-control" require>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input value="<?= old('password') ?>" type="password" name="password" class="form-control" require>
        </div>
        <div class="form-group">
            <label>Password comfirm:</label>
            <input value="<?= old('password_comfirm') ?>" type="password" name="password_comfirm" class="form-control" require>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>