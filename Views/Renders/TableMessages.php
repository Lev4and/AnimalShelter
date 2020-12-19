<div class="table-block">
    <table border="1">
        <tr class="table-block-headers">
            <th class="table-block-header">ФИО клиента</th>
            <th class="table-block-header">Дата отправки</th>
            <th class="table-block-header">Сообщение</th>
        </tr>
        <?php foreach ($messages as $message): ?>
            <tr class="table-block-values">
                <td class="table-block-value-text"><?php echo $message["full_name"]; ?></td>
                <td class="table-block-value-text"><?php echo $message["date_of_send"]; ?></td>
                <td class="table-block-value-text"><?php echo $message["message"]; ?></td>
            </tr>
        <? endforeach; ?>
    </table>
</div>