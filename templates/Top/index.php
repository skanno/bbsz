<?php foreach ($topCategories as $topCategory): ?>
    <h2><?= $topCategory->name ?></h2>
    <ul>
        <?php foreach ($topCategory->categories as $category): ?>
            <li><a href="<?= $topCategory->id ?>/<?= $category->id ?>"><?= $category->name ?></a></li>
        <?php endforeach ?>
    </ul>
<?php endforeach ?>
