<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Insert Post</title>
</head>

<body>
    <div class="container">
        <?php
        include("oop.php");
        $db = new Blog();
        $db->_get();
        if (isset($_POST['submit'])) {
            $error = [];
            if (isset($_POST['title']) && empty($_POST['title'])) {
                $error['title'] = "enter the title";
            } else {
                $title = $_POST['title'];
            }
            if (isset($_POST['content']) && empty($_POST['content'])) {
                $error['content'] = "enter the content";
            } else {
                $content = $_POST['content'];
            }

            if (count($error) <= 0) {
                $db->insert("posts", "title,content", "'$title','$content'");
                header("location:posts.php");
            }
        }
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="m-auto" style="max-width:600px">
            <h3 class="my-4">Insert Post</h3>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Post Title</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title" placeholder="Enter Post Title">
                    <p style="color: red;"><?php if (isset($error['title'])) echo $error['title'] ?></p>
                </div>
            </div>

            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
                <div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" placeholder="Enter Content"></textarea>
                    <p style="color: red;"><?php if (isset($error['content'])) echo $error['content'] ?></p>
                </div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
                <div class="col-md-7"><button class="btn btn-primary btn-lg" name="submit" type="submit">Insert</button></div>
            </div>
        </form>
    </div>
</body>

</html>