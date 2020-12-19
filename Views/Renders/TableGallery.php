<div class="table-block">
    <table border="1">
        <tr class="table-block-headers">
            <th class="table-block-header">Фото</th>
            <th class="table-block-header">Изменить</th>
            <th class="table-block-header">Удалить</th>
        </tr>
        <?php foreach ($photos as $photo): ?>
            <tr class="table-block-values">
                <td class="table-block-value-image"><div><img src="/Resources/Images/Upload/<?php echo $photo["photo"]; ?>"></div></td>
                <td class="table-block-value-image"><div><a href=".?action=Изменить&photoId=<?php echo $photo["id"]; ?>"><img src="/Resources/Images/Interface/Change.png"></a></div></td>
                <td class="table-block-value-image"><div><a href=".?action=Удалить&photoId=<?php echo $photo["id"]; ?>"><img src="/Resources/Images/Interface/Remove.png"></a></div></td>
            </tr>
        <? endforeach; ?>
        <tr class="table-block-actions">
            <td class="table-block-action" colspan="5"><div><a href=".?action=Добавить"><button>Добавить</button></a></div></td>
        </tr>
    </table>
</div>