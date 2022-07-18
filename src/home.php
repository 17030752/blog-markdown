<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="src/resources/main.css">
</head>
<body>
    <?php require('resources/navbar.php'); ?>
    <div class="post-container">
    <h1>bienvenido a mi blog</h1>
    <?php
    require_once('src/models/Post.php');
    use d17030752\Blog\models\Post;
    $posts = Post::getPost();
    foreach ($posts as $post) {
        echo "<div><a class='post' href='{$post->getUrl()}'>{$post->getPostName()}</a></div>";
    }
    ?>
    </div>
</body>
</html>