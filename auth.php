<?php include('vendor/server.php') ?>
<!doctype html>

<head>
    <meta charset="utf-8">
    <title>Login</title>

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->

    <link rel="stylesheet" href="css/auth.css">

    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<div class="form-structor">
    <div class="signup">
        <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
        <form method="post" action="auth.php">
        <div class="form-holder">
            <input type="text" class="input" placeholder="Username" name="username" required/>
            <input type="email" class="input" placeholder="Email" name="email" required/>
            <input type="password" class="input" placeholder="Password" name="password_1" required/>
        </div>
        <button class="submit-btn" name="reg_user">Sign up</button>
        </form>
    </div>
    <div class="login slide-up">
        <div class="center">
            <h2 class="form-title" id="login"><span>or</span>Log in</h2>
            <form method="post" action="auth.php">
                <div class="form-holder">
                    <input type="text" class="input" placeholder="Username" name="username" required/>
                    <input type="password" class="input" placeholder="Password" name="password" required/>
                </div>
                <button class="submit-btn" name="login_user">Log in</button>
            </form>
        </div>
    </div>
</div>
</body>
<script src="js/auth.js"></script>
</html>
