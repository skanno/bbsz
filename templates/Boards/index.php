<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board[]|\Cake\Collection\CollectionInterface $boards
 */
?>
<div class="boards index content">
    <?= $this->Html->link(__('New Board'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Boards') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($boards as $board): ?>
                <tr>
                    <td><?= $this->Number->format($board->id) ?></td>
                    <td><?= $board->has('category') ? $this->Html->link($board->category->name, ['controller' => 'Categories', 'action' => 'view', $board->category->id]) : '' ?></td>
                    <td><?= h($board->name) ?></td>
                    <td><?= h($board->created) ?></td>
                    <td><?= h($board->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $board->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $board->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]) ?>
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
