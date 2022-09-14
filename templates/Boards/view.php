<?php
$this->Breadcrumbs->add([
    ['title' => 'ホーム', 'url' => '/'],
    ['title' => h($board->category->name), 'url' => ['action' => 'index', $board->category->id]],
    ['title' => h($board->name), 'url' => null],
]);
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="boards view content">
            <h3><?= h($board->name) ?></h3>
            <div class="text">
                <blockquote>
                    <?= nl2br($this->Text->autoLink(h($board->description), ['target' => '_blank'])) ?>
                </blockquote>
            </div>
        </div>
    </div>

    <?php // ▼▼▼ 投稿フォーム ▼▼▼ ?>
    <?= $this->Form->create($post) ?>
        <fieldset>
            <?php
                echo $this->Form->hidden('board_id', ['value' => $board->id]);
                echo $this->Form->control('nick_name', ['label' => 'ニックネーム']);
                echo $this->Form->control('body', ['label' => '発言']);
            ?>
        </fieldset>
        <div class="text-center"><?= $this->Form->button('送信', ['class' => 'btn btn-primary m-3']) ?></div>
    <?= $this->Form->end() ?>
    <?php // ▲▲▲ 投稿フォーム ▲▲▲ ?>

    <?php // ▼▼▼ 投稿一覧 ▼▼▼ ?>
    <?php if ($posts->count()): ?>
        <ul class="list-group">
            <?php foreach ($posts as $post): ?>
                <li class="list-group-item bg-info bg-opacity-25">
                    <div><strong><?= h($post->nick_name) ?></strong> <?= h($post->created->i18nFormat('yyyy-MM-dd HH:mm:ss')) ?></div>
                    <div class="m-2"><?= nl2br($this->Text->autoLink(h($post->body), ['target' => '_blank'])) ?></div>
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <?php // ▲▲▲ 投稿一覧 ▲▲▲ ?>

    <?= $this->element('paginator') ?>
</div>
