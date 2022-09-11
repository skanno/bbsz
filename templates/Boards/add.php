<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading">板を作成</h4>
        </div>
    </aside>
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
            <?= $this->Form->button('作成') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
