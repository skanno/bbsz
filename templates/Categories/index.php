<?php
$this->Breadcrumbs->add([
    ['title' => 'ホーム', 'url' => '/'],
    ['title' => h($topCategory->name), 'url' => null],
]);
?>
<div class="categories index content">
    <ul class="list-group">
        <?php foreach ($categories as $category): ?>
            <li class="list-group-item bg-info bg-opacity-25">
                <?= $this->Html->link($category->name, [
                    'controller' => 'boards',
                    $category->id,
                ]) ?>
                (<?= count($category->boards) ?>)
            </li>
        <?php endforeach ?>
    </ul>
</div>
