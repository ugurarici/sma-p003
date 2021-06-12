<?php
require "functions.php";

$examResult = getResultData();

if (count($examResult) > 0) :
?>
    <a href="result.php">Mevcut Sonuçları Görüntüle</a>
    <hr>
<?php endif; ?>
<form action="saveresult.php" method="post">
    <?php for ($i = 1; $i <= 3; $i++) : ?>
        <?= $i ?>.
        <input type="text" name="students[]" placeholder="Öğrenci Adı">
        <input type="number" min="0" max="100" name="notes[]" placeholder="Not">
        <br>
    <?php endfor; ?>
    <button type="submit">Notları Kaydet</button>
</form>