<html>

<head>
    <meta charset="utf-8">
    <title>Form</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
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
            background: #03a9f4;
            width: 350px;
            height: 300px;
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
        // include("registration.php");
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $db = new Blog();
            $db->_get();
            $error = [];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $data = $db->select("*", "users", "email='$email'");
            if ($data->rowcount() > 0) {
                $row = $data->fetch(PDO::FETCH_ASSOC);
                $hash = $row['password'];
                $verify = password_verify($pass, $hash);
                if ($verify) {
                    header("location:posts.php");
                    die();
                } else {
                   echo "enter vaild pass";
                }
            } else {
             echo "email not found";
            }
        }

        ?>
        <form method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!---Email ID---->
            <div class="box">
                <label for="email" class="fl fontLabel"> Email ID: </label>
                <div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="email" name="email" placeholder="Email Id" class="textBox">
                    <p style="color: white;"><?php if (isset($error['email'])) {
                                                    echo $error['email'];
                                                } ?></p>

                </div>
                <div class="clr"></div>
            </div>
            <!--Email ID----->

            <!---Password------>
            <div class="box">
                <label for="password" class="fl fontLabel"> Password </label>
                <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="Password" name="password" placeholder="Password" class="textBox">
                    <p style="color: white;"><?php if (isset($error['password'])) {
                                                    echo $error['password'];
                                                } ?></p>

                </div>
                <div class="clr"></div>
            </div>
            <!---Password---->

            <!---Submit Button------>
            <input type="Submit" name="Submit" class="submit" value="Login">
            <!---Submit Button----->
        </form>
    </div>
    <!--Body of Form ends--->
</body>

</html>