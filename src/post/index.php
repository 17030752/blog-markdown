<?php

use d17030752\Blog\models\Post;

require_once 'src/models/Post.php';
$post = new Post($postName . '.md');
?>
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
    <?php require('src/resources/navbar.php'); ?>
    <div class="post-container">
    <?php
    echo    $post->getContent();
    ?>
    </div>
</body>

</html>