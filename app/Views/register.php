<!DOCTYPE html>

<html>
    <head>
        <title> DangTrungHieu2019326 </title>
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
        <h2>Sign in/Sign up </h2>
        <div class="container" id="container">
        
        <div class="form-container sign-in-container">
            <form action="<?= base_url() ?>/user/login" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email(EROR)</span>
                <input name='tkBenhNhan' value="<?= old($tbenhnhan['tkBenhNhan']) ?>" type="email" placeholder="Email" />
                <input name='mkBenhNhan' value="<?= old($tbenhnhan['mkBenhNhan']) ?>" type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a> 
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and sign up in here</p>
                     <button class="ghost" id="signUp" onclick="window.location.href='<?= base_url() ?>/user/signup'" >Sign up</button>
                     <!-- chua co back end -->
                </div>
            </div>
        </div>
    </div>
    <script id='everest-forms-js-extra'></script>
    </body>
</html>