<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Öğrenci Adı</th>
            <th>Notu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_POST['students'] as $key => $value) : ?>
            <tr>
                <td><?= $value ?></td>
                <td><?= $_POST['notes'][$key] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>