<?php
$this->Breadcrumbs->add([
    ['title' => 'ホーム', 'url' => '/'],
    ['title' => h($topCategory->name), 'url' => ['controller' => 'categories', 'action' => 'index', $topCategory->id]],
    ['title' => h($category->name), 'url' => null],
]);
?>
<div class="boards index content">
    <?= $this->Html->link('新しい板を作成', ['action' => 'add', $category->id], ['class' => 'button float-right']) ?>
    <h3>板一覧</h3>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <?php foreach ($boards as $board): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(__($board->name), ['action' => 'view', $board->id]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php if (!count($boards)): ?>
                    <tr>
                        <td>
                            板はありません。
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('paginator') ?>
</div>
