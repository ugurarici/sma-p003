<?php
include "header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12 my-2">
            <div class="list-group">
                <?php foreach ($articles as $item) : ?>
                    <a href="detail.php?id=<?php echo $item->id ?>" class="list-group-item list-group-item-action">
                        <?php echo $item->title ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>