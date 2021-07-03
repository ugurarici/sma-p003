<?php
$documentTitle = $article->title;
include "header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-3  my-2">
            <div class="list-group">
                <?php foreach ($articles as $item) : ?>
                    <a href="detail.php?id=<?php echo $item->id ?>" class="list-group-item list-group-item-action <?php if ($_GET['id'] == $item->id) echo "active" ?>">
                        <?php echo $item->title ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-9  my-2">
            <div class="card">
                <div class="card-body">
                    <h1><?php echo $article->title; ?></h1>
                    <p><?php echo $article->content; ?></p>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <hr>
                        <a href="editarticle.php?id=<?= $article->id ?>" class="btn btn-outline-info">Edit</a>
                        <a href="deletearticle.php?id=<?= $article->id ?>" class="btn btn-outline-danger">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>