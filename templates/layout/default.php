<?php
$title = 'BBSZ | ';
$crumbs = $this->Breadcrumbs->getCrumbs();
if (count($crumbs)) {
    $title .= h(end($crumbs)['title']) . '関連の掲示板';
} else {
    $title .=  'みんなの掲示板！';
}
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->meta('description', 'BBSZは楽しい掲示板です。') ?>
    <?= $this->Html->meta('keywords', '掲示板,BBS') ?>
    <?= $this->Html->css('BootstrapUI.bootstrap.min') ?>
    <?= $this->Html->css(['BootstrapUI./font/bootstrap-icons', 'BootstrapUI./font/bootstrap-icon-sizes']) ?>
    <?= $this->Html->script(['BootstrapUI.popper.min', 'BootstrapUI.bootstrap.min']) ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="container">
    <header class="header text-center p-5">
        <div>
            <h1 class="display-1">BBSZ</h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <?= $this->Breadcrumbs->render(
                ['class' => 'breadcrumbs-trail'],
                ['separator' => '<i class="fa fa-angle-right"></i>']
            ) ?>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="footer text-center p-4">
        <hr>
        <div>
            <p class="text-muted">Copyright &copy; bbsz.s-kanno.net All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
