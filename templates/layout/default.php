<?php
$title = '';
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
    <title>BBSZ | <?= $title ?></title>
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

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@infoBBSZ" />
    <meta name="twitter:creator" content="@infoBBSZ" />
    <meta property="og:url" content="https://bbsz.s-kanno.net" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="他にもいろんな掲示板があるよ！" />
    <meta property="og:image" content="https://bbsz.s-kanno.net/img/eye-catch.png" />
</head>
<body class="container">
    <header class="header text-center p-5">
        <div>
            <h1 class="display-1">BBSZ</h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="p-3">
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            <div>
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
