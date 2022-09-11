<div class="boards index content">
    <?= $this->Html->link('新しい板を作る', ['action' => 'add', $categoryId], ['class' => 'button float-right']) ?>
    <h3>板一覧</h3>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <?php foreach ($boards as $board): ?>
                <tr>
                    <td>
                        <?= $this->Html->link(__($board->name), ['action' => 'view', $board->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
