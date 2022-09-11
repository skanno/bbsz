<div class="row">
    <div class="column-responsive column-80">
        <div class="boards view content">
            <h3><?= h($board->name) ?></h3>
            <div class="text">
                <blockquote>
                    <?= $this->Text->autoParagraph(h($board->description)) ?>
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
        <div class="text-center"><?= $this->Form->button('送信', ['class' => 'btn btn-primary']) ?></div>
    <?= $this->Form->end() ?>
    <?php // ▲▲▲ 投稿フォーム ▲▲▲ ?>

    <?php // ▼▼▼ 投稿一覧 ▼▼▼ ?>
    <?php if ($posts->count()): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="row">
                        <th class="col-2">ニックネーム</th>
                        <th class="col-8">発言</th>
                        <th class="col-2">日時</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                    <tr class="row">
                        <td class="col-2"><?= h($post->nick_name) ?></td>
                        <td class="col-8"><?= nl2br(h($post->body)) ?></td>
                        <td class="col-2"><?= h($post->created->i18nFormat('yyyy-MM-dd HH:mm:ss')) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
    <?php // ▲▲▲ 投稿一覧 ▲▲▲ ?>

    <?= $this->element('paginator') ?>
</div>
