<?php
$this->Breadcrumbs->add([
    ['title' => 'ホーム', 'url' => '/'],
    ['title' => h($topCategory->name), 'url' => ['controller' => 'categories', 'action' => 'index', $topCategory->id]],
    ['title' => h($category->name), 'url' => null],
]);
?>
<div class="boards index content">
    <div class="m-4">
        <?= $this->Html->link('新しい板を作成',
            ['action' => 'add', $category->id],
            ['class' => 'button float-right p-2']
        ) ?>
    </div>
    <ul class="list-group">
        <?php foreach ($boards as $board): ?>
            <li class="list-group-item bg-info bg-opacity-25">
            <?= $this->Html->link(__($board->name), ['action' => 'view', $board->id]) ?>
            </li>
        <?php endforeach ?>
        <?php if (!count($boards)): ?>
            <li class="list-group-item bg-info bg-opacity-25">
                板はありません。
            </li>
        <?php endif ?>
    </ul>
    <?= $this->element('paginator') ?>
</div>
