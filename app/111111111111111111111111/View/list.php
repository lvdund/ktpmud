<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>list</title>
</head>
<body>
    <h2>I am lvdund.</h2>
    <?= view('message/message'); ?>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td><br>
                <td><?= $user['email'] ?></td><br>
                <td><?= $user['name'] ?></td><br>
                <td class="text-center">
                    <a href="<?= base_url() ?>/admin/user/edit/<?= $user['id'] ?>" class="btn btn-primary"><i class="fas fa-edit">Change</i></a>
                    <a href="<?= base_url() ?>/admin/user/delete/<?= $user['id'] ?>" class="btn btn-danger btn-del-comfirm"><i class="far fa-trash-alt">Delete</i></a>
                </td><br><br>
            </tr>
        <?php endforeach ?>
    </tbody>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url();?>/public/homepage/js/event.js"></script>

</body>
</html>