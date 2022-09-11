<div class="row">
    <?php foreach ($topCategories as $topCategory): ?>
        <div class="col-3">
            <h3 class="m-2"><?= $topCategory->name ?></h3>
            <ul class="list-group">
                <?php foreach ($topCategory->categories as $category): ?>
                    <li class="list-group-item">
                        <?= $this->Html->link($category->name, [
                            'controller' => 'boards',
                            $category->id,
                        ]) ?>
                        (<?= count($category->boards) ?>)
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endforeach ?>
</div>
