<div class="table-block">
    <table border="1">
        <tr class="table-block-headers">
            <th class="table-block-header">ФИО клиента</th>
            <th class="table-block-header">Е-Mail</th>
        </tr>
        <?php foreach ($mailing as $mail): ?>
            <tr class="table-block-values">
                <td class="table-block-value-text"><?php echo $mail["full_name"]; ?></td>
                <td class="table-block-value-text"><?php echo $mail["e_mail"]; ?></td>
            </tr>
        <? endforeach; ?>
    </table>
</div>