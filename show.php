<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f6f6f6;
        }
        .box{
            width: 350px;

        }
        .box h2{
            color: #fff;
            background: #03a9f4;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
        }
        .box ul{
            position: relative;
            background: #fff;
        }
        .box ul li{
            list-style: none;
            padding: 10px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 5px 25px rgba(0, 0,0,.1);
            transition:transform 0.5s;
        }
        .box ul li span{
            margin-right:10px ;
            font-size: 15px; 
            border-radius: 50%;
            line-height: 22px;
            width: 20px;
            height: 20px;
        }
        strong{
            color: #03a9f4;
        }
    </style>
</head>

<body>
        <?php
    //connection
        $pdo = new pdo("mysql:host=localhost;dbname=blogdb", "root", "");
        $status=false;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $status=true;
            $data = $pdo->query("select * from posts where id='$id'");
            $row = $data->fetch(pdo::FETCH_ASSOC);
        }
   
    ?>
    <?php 
    if($status){
        ?>
        <div class="box">
        <h2>Show Post</h2>
        <ul>
        <li><span><strong>The Title is: </strong><?php echo $row['title'] ?></span></li>
        <li><span><strong>The Content is: </strong><?php echo $row['content']?></h3></span></li>
        <li><span><strong>The Date is: </strong><?php echo $row['created_at']?></h3></span></li>
    </ul>

    </div>
</body>
<?php
    }

else{
    echo "invalid request";
}
?>
</html>
