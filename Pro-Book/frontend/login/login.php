<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="/tugasbesar2_2018/Pro-Book/frontend/login/login.js"></script>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link rel="stylesheet" type="text/css" href="/tugasbesar2_2018/Pro-Book/frontend/login/login.css">
        <link href='https://fonts.googleapis.com/css?family=Pathway Gothic One' rel='stylesheet'>
    </head>
    <body>
        <?php
            require_once "lib/vendor/autoload.php" ;
            
            session_start();
            
            if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            var_dump($profile);
            $profile = $_SESSION['access_profile'];
            echo "<img src=\"{$profile['image']['url']}\">";
            echo "<h3>Hai, {$profile['displayName']} ({$profile['emails']['0']['value']})</h3>";
            echo "Anda telah berhasil login menggunakan akun google anda, klik <a href='logout.php'>Logout</a> untuk keluar.";
            } else {
                $output = '<a href="http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/login_with_google"><img id = "login-google" src="/tugasbesar2_2018/Pro-Book/frontend/img_resource/google-sign-in-btn.png" alt=""/></a>';
            }
        ?>
        <div class = "outer">
            <div class="class1">
                <div class="title">
                    <h1>LOGIN</h1>
                </div>
                <form name = "login" action="http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/login" onsubmit="return validateForm()" method="post">
                    <div class="input">
                        <label>Username </label><input type="text" name="username"><br><br>
                        <label>Password</label> <input type="password" name="password"><br><br>
                    </div>
                    <a href="http://localhost/tugasbesar2_2018/Pro-Book/index.php/User/index"> Don't have an account?</a><br><br>
                    <input type="submit" name="login" value="Login"><br>
                </form>
            </div>
            <div class="container">
                <!-- Display login button / Google profile information -->
                <?php echo $output; ?>
            </div>
        </div>
        
    </body>
</html>

