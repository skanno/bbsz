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
    <div class="column-responsive column-80">
        <div class="posts form content">
            <?= $this->Form->create($post) ?>
            <fieldset>
                <?php
                    echo $this->Form->hidden('board_id', ['value' => $board->id]);
                    echo $this->Form->control('nick_name', ['label' => 'ニックネーム']);
                    echo $this->Form->control('body', ['label' => '発言']);
                ?>
            </fieldset>
            <?= $this->Form->button('送信') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <?php // ▲▲▲ 投稿フォーム ▲▲▲ ?>

    <?php // ▼▼▼ 投稿一覧 ▼▼▼ ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ニックネーム</th>
                    <th>発言</th>
                    <th>日時</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= h($post->nick_name) ?></td>
                    <td><?= h($post->body) ?></td>
                    <td><?= h($post->created) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php // ▲▲▲ 投稿一覧 ▲▲▲ ?>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
