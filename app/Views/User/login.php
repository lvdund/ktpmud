<!DOCTYPE html>

<html>
    <head>
        <title> Login </title>
        <meta charset="utf-8">
        <!--custom css file link-->
        <link rel="stylesheet" href="<?= base_url();?>/public/register.css">
        <!-- font awesome file link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            h1{
                color:blue;
                font-size: 40px;
            }
        </style>
    </head>

    <body>
        <?= view('message/message') ?>
    <div class="container" id="container">
        <form action="<?= base_url() ?>/user/login" method="post">
                <h1>Sign in</h1>
                <input name='tkBenhNhan' type="email" placeholder="Email" />
                <input name='mkBenhNhan' type="password" placeholder="Password" />
            <button>Sign In</button>
        </form>
    </div>
    <script id='everest-forms-js-extra'></script>
    </body>
</html>