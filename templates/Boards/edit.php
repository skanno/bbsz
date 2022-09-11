<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board $board
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $board->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $board->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Boards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="boards form content">
            <?= $this->Form->create($board) ?>
            <fieldset>
                <legend><?= __('Edit Board') ?></legend>
                <?php
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
