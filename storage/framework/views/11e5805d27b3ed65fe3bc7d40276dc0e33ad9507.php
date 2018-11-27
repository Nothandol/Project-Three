<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Share & View</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #FBFCFC  ;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #900C3F;
            }
            .paragraph {
                color: #D35400;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            footer {
        padding:20px;
	margin-top:20px;
	color:#900C3F;
	background-color:#FBEEE6;
	text-align:center;
    }
     </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Share & View
                </div>
          <p class = "paragraph" > Welcome to our Document Management System.  Login or register if you are not a user.</p>
          <h3>About This Website</h3>
          <p class = "paragraph" > This is a documents version control website where you can upload, download, and edit files. Changes made to any document will be logged.</p>
          <p class = "paragraph" > You need to register as a member before you can have access to any files uploaded or if you want to edit files. Once you have registered, you will have to login as a user to gain access to the documents.</p>
          <p class = "paragraph" >  Documents that are supported by this website must have either of the following extensions: .csv, .doxc, .doc. Make sure that you upload documents with the extensions mentioned.</p>
          <footer>
            <p> Share & View, Copyright &copy; 2018 </p>
            <small>L.N Ngwenya, 2018</small>
     </footer>
            </div>
        </div>
    </body>
</html>
