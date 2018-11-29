<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="/tugasbesar2_2018/Pro-Book/frontend/register/register.js"></script>
        <link rel="stylesheet" type="text/css" href="/tugasbesar2_2018/Pro-Book/frontend/register/register.css">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link href='https://fonts.googleapis.com/css?family=Pathway Gothic One' rel='stylesheet'>
    </head>
    <body>
        <div class="outer">
            <div class="class1">
                <div class="title">
                    <h1>REGISTER</h1>
                </div>
                <div>
                    <form name = "register" action="http://localhost/tugasbesar2_2018/Pro-Book/index.php/User/register" onsubmit="return validateForm()" method="post">
                        <div class="input">
                            <label>Name <input type="text" name="name" value="<?php echo $GLOBALS['user']->getName() ?>><br></label>
                            <div class="checklistForm">
                                <div><label>Username <input type="text" name="username" onchange="validateUsername(this.value)"></label></div>
                                <div class="checklist"><img id="usernameChecklist" src="/tugasbesar2_2018/Pro-Book/frontend/img_resource/checklist.PNG"></div>
                            </div>
                            <div class="checklistForm">
                                <div><label>Email <input type="text" name="email" value="<?php echo $GLOBALS['user']->getEmail() ?>></label></div>
                                <div class="checklist"><img src="/tugasbesar2_2018/Pro-Book/frontend/img_resource/checklist.PNG" id="emailChecklist"></div><br>
                            </div>
                            <label>Password <input type="password" name="password"><br></label>
                            <label>Confirm Password <input type ="password" name="confirmPassword"><br></label>
                            <label>Address <textarea rows="3" cols="21" name="address"></textarea><br></label>
                            <label>Phone Number <input type="number" name="phone"><br></label>
                            <label>Card Number<input type="number" name="card"><br></label>
                        </div>
                        <br>
                        <a href="http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index"> Already have account?</a><br><br>
                        <input type="submit" name="register" value="Register"><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
