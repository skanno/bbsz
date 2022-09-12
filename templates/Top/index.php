<?php
$limit = 15;
?>
<div class="row">
    <?php foreach ($topCategories as $topCategory): ?>
        <div class="col-3">
            <h3 class="m-2"><?= $topCategory->name ?></h3>
            <ul class="list-group">
                <?php foreach (array_slice($topCategory->categories, 0, $limit) as $category): ?>
                    <li class="list-group-item">
                        <?= $this->Html->link($category->name, [
                            'controller' => 'boards',
                            $category->id,
                        ]) ?>
                        (<?= count($category->boards) ?>)
                    </li>
                <?php endforeach ?>
            </ul>
            <?php if (count($topCategory->categories) > $limit): ?>
                <div class="d-flex justify-content-end p-2">
                    <?= $this->Html->link('もっと見る', [
                        'controller' => 'categories',
                        $topCategory->id,
                    ]) ?>
                </div>
            <?php endif ?>
        </div>
    <?php endforeach ?>
</div>
