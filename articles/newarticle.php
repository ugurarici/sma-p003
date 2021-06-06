<?php include "header.php"; ?>
<div class="container">
    <form action="createarticle.php" class="form" method="post">
        Title: <input type="text" name="title">
        <br>
        Content:<br>
        <textarea name="content"></textarea>
        <br>
        <button type="submit">Save New Article</button>
    </form>
</div>
<?php include "footer.php"; ?>