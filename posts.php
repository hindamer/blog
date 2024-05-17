<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Post</title>
    <style>
        
        body {
            color: #73879C;
            background-color: white;
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.471;
        }
        table{
            margin-top:20px; 
            width: 50%;
        }
        h2{
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <h2>Table Of Posts</h2>
    <table class="table" style="width:100%;padding:50px" >
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Createt_at</th>
                <th>Show</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include("oop.php");
            $db = new Blog();
            $db->_get();
            $data = $db->select("*", "posts");
            $row = $data->fetchAll(PDO::FETCH_ASSOC);
            if (isset($_POST['delete'])) {
                    $id = $_POST['id'];
                    $db->delete("posts", "id='$id'");
                }
            foreach ($row as $post) { ?>
                <tr>
                    <td><?php echo $post['title'] ?></td>
                    <td><?php echo $post['content'] ?></td>
                    <td><?php echo $post['created_at'] ?></td>
                    <td><a href="show.php?id=<?php echo $post['id']?>">
                    <button type="button" class="btn btn-success">Show</button>
                </a></td>
                <td>
                        <form method="post" action="updatepost.php">
                            <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                            <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
                        </form>
                    </td>
                    <td>
                      
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                            <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
                        </form>
                    </td>
                  
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="addpost.php">
    <button type="button" class="btn btn-secondary">Add Post!</button>
    </a>
</body>

</html>