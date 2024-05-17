<html>

<head>
    <meta charset="utf-8">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background: url(http://wrbbradio.org/wp-content/uploads/2016/10/grey-background-07.jpg) no-repeat center fixed;
            background-size: cover;
        }

        .container {
            background:#03a9f4 ;
            width: 350px;
            height: 350px;
            padding-bottom: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: auto;
            padding: 70px 50px 20px 50px;
        }


        .fl {
            float: left;
            width: 110px;
            line-height: 35px;
        }

        .fontLabel {
            color: white;
        }

        .fr {
            float: right;
        }

        .clr {
            clear: both;
        }

        .box {
            width: 360px;
            height: 35px;
            margin-top: 10px;
            font-family: verdana;
            font-size: 13px;
        }

        .textBox {
            height: 35px;
            width: 190px;
            border: none;
            padding-left: 20px;
        }

        .new {
            float: left;
        }

        .iconBox {
            height: 35px;
            width: 40px;
            line-height: 50px;
            text-align: center;
            background-color: white;
        }

        .submit {
            float: right;
            margin-top: 50px;
            border: none;
            color: #03a9f4;
            width: 110px;
            height: 35px;
            background: white;
            border-radius: 10px;
            text-transform: uppercase;
            font-weight: bolder;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Body of Form starts -->
    <div class="container">
        <?php
        include("oop.php");
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $db = new Blog();
            $db->_get();
            $error = [];
            if (isset($_POST['firstName']) && empty($_POST['firstName'])) {
                $error['ferror'] = "enter your firstName";
            } else {
                $firstName = $_POST['firstName'];
            }
            if (isset($_POST['secondName']) && empty($_POST['secondName'])) {
                $error['serror'] = "enter your secondName";
            } else {
                $secondName = $_POST['secondName'];
            }
            if (isset($_POST['phoneNo']) && empty($_POST['phoneNo'])) {
                $error['phoneNo'] = "enter your phoneNo";
            } else {
                $phoneNo = $_POST['phoneNo'];
            }
            $email = $_POST['email'];
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            if (isset($_POST['email']) && empty($_POST['email'])) {
                $error['email'] = "enter your email";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['mail'] = "enter validate email";
                } elseif (isset($_POST['password']) && empty($_POST['password'])) {
                    $error['password'] = "enter your password";
                // } elseif (!$upper || !$lower || !$num || !$char || strlen($password) < 8) {
                //     $error['pass'] = "pass not valid";
                } else {
                    if (count($error) <= 0) {
                        $db->insert("users", "firstName,secondName,phoneNo,email,password","'$firstName','$secondName','$phoneNo','$email','$password'");
                        header("Location:login.php");
                        die();
                    }
                }
            }
        }
        // $upper = preg_match('@[A-Z]@', $password);
        // $lower = preg_match('@[a-z]@', $password);
        // $num = preg_match('@[0-9]@', $password);
        // $char = preg_match('@[^\w]@', $password);
       
        ?>

        <form method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!--First name-->
            <div class="box">
                <label for="firstName" class="fl fontLabel"> First Name: </label>
                <div class="new iconBox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="fr">
                    <input type="text" name="firstName" placeholder="First Name" class="textBox" autofocus="on">
                    <p style="color: white;"><?php if (isset($error['ferror'])) {
                                                    echo $error['ferror'];
                                                } ?></p>
                </div>
                <div class="clr"></div>
            </div>
            <!--First name-->


            <!--Second name-->
            <div class="box">
                <label for="secondName" class="fl fontLabel"> Seconed Name: </label>
                <div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="text" name="secondName" placeholder="Last Name" class="textBox">
                    <p style="color: white;"><?php if (isset($error['serror'])) {
                                                    echo $error['serror'];
                                                } ?></p>

                </div>
                <div class="clr"></div>
            </div>
            <div class="box">
                <label for="phone" class="fl fontLabel"> Phone No: </label>
                <div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="text" name="phoneNo" maxlength="10" placeholder="Phone No." class="textBox">
                    <p style="color: white;"><?php if (isset($error['phoneNo'])) {
                                                    echo $error['phoneNo'];
                                                } ?></p>

                </div>
                <div class="clr"></div>
            </div>
            <div class="box">
                <label for="email" class="fl fontLabel"> Email ID: </label>
                <div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="text" name="email" placeholder="Email Id" class="textBox">
                    <p style="color: white;"><?php if (isset($error['email'])) {
                                                    echo $error['email'];
                                                } ?></p>
                    <p style="color: white;"><?php if (isset($error['mail'])) {
                                                    echo $error['mail'];
                                                } ?></p>



                </div>
                <div class="clr"></div>
            </div>
            <!--Email ID----->


            <!---Password------>
            <div class="box">
                <label for="password" class="fl fontLabel"> Password: </label>
                <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="Password" name="password" placeholder="Password" class="textBox">
                    <p style="color: white;"><?php if (isset($error['password'])) {
                                                    echo $error['password'];
                                                } ?></p>
                    <p style="color: white;"><?php if (isset($error['pass'])) {
                                                    echo $error['pass'];
                                                } ?></p>


                </div>

            </div>
            <div class="sub" style="background-color:white;color:#03a9f4">
            <input type="Submit" name="Submit" class="submit" value="SUBMIT">
            </div>
        </form>
    </div>

</body>

</html>