<?php if ($this->Paginator->counter('{{count}}') !== '0'): ?>
    <div class="row">
        <div class="col-4"></div>
        <div class="paginator col-4">
            <ul class="pagination">
                <?= $this->Paginator->first('<< 最初') ?>
                <?= $this->Paginator->prev('< 前') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('次 >') ?>
                <?= $this->Paginator->last('最後 >>') ?>
            </ul>
            <p><?= $this->Paginator->counter('{{pages}}ページ中{{page}}ページ目 全{{count}}件') ?></p>
        </div>
        <div class="col-4"></div>
    </div>
<?php endif ?>
