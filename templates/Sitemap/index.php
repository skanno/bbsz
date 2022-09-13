<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $this->Url->build('https://bbsz.s-kanno.net/', ['fullBase'=>true]); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <?php foreach ($topCategories as $topCategory): ?>
        <url>
            <loc><?= $this->Url->build(['_ssl' => true, 'controller' => 'categories', 'action' => 'index', $topCategory->id], ['fullBase'=>true]); ?></loc>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
        <?php foreach ($topCategory->categories as $category): ?>
            <url>
                <loc><?= $this->Url->build(['_ssl' => true, 'controller' => 'boards', 'action' => 'index', $category->id], ['fullBase'=>true]); ?></loc>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
            <?php foreach ($category->boards as $board): ?>
                <url>
                    <loc><?= $this->Url->build(['_ssl' => true, 'controller' => 'boards', 'action' => 'view', $board->id], ['fullBase'=>true]); ?></loc>
                    <changefreq>weekly</changefreq>
                    <priority>0.7</priority>
                </url>
            <?php endforeach ?>
        <?php endforeach ?>
    <?php endforeach ?>
</urlset>
