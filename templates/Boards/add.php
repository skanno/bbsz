<?php
$this->Breadcrumbs->add([
    ['title' => 'ホーム', 'url' => '/'],
    ['title' => h($category->name), 'url' => ['action' => 'index', $category->id]],
    ['title' => '新しい板を作成', 'url' => null],
]);
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="boards form content">
            <?= $this->Form->create($board) ?>
            <fieldset>
                <?php
                    echo $this->Form->hidden('category_id', ['value' => $category->id]);
                    echo $this->Form->control('name', ['label' => '板の名前']);
                    echo $this->Form->control('description', ['label' => '説明']);
                ?>
            </fieldset>
            <?= $this->Form->button('作成', ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
