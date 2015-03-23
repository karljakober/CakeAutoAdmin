<table>
    <tr>
        <th><?= $this->Paginator->sort('id', 'ID') ?></th>
        <th><?= $this->Paginator->sort('Users.useremail', 'Email') ?></th>
    </tr>
       <?php foreach ($records as $record): ?>
    <tr>
        <td><?= h($record->id) ?> </td>
        <td><?= h($record->useremail) ?> </td>
    </tr>
    <?php endforeach; ?>
</table>
