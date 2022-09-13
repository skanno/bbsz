<?php
$this->Breadcrumbs->add([
    ['title' => 'ホーム', 'url' => '/'],
    ['title' => h($topCategory->name), 'url' => null],
]);
?>
<div class="categories index content">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td>
                        <?= $this->Html->link($category->name, [
                            'controller' => 'boards',
                            $category->id,
                        ]) ?>
                        (<?= count($category->boards) ?>)
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
