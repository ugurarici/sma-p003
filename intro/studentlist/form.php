<form action="result.php" method="post">
    <?php for ($i = 1; $i <= 6; $i++) : ?>
        <?= $i ?>.
        <input type="text" name="students[]" placeholder="Öğrenci Adı">
        <input type="number" min="0" max="100" name="notes[]" placeholder="Not">
        <br>
    <?php endfor; ?>
    <button type="submit">Öğrencileri Listele</button>
</form>