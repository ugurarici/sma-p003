<?php
require "data.php";

if (!isset($_GET['id']) || !isset($articles[$_GET['id']])) {
    header("Location: index.php");
    die();
}

$key = $_GET["id"];

$article = $articles[$key];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title><?php echo $article["title"]; ?></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3  my-2">
                <div class="list-group">
                    <?php foreach ($articles as $key => $item) : ?>
                        <a href="detail.php?id=<?php echo $key ?>" class="list-group-item list-group-item-action <?php if ($_GET['id'] == $key) echo "active" ?>">
                            <?php echo $item['title'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-9  my-2">
                <div class="card">
                    <div class="card-body">
                        <h1><?php echo $article["title"]; ?></h1>
                        <p><?php echo $article["content"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>