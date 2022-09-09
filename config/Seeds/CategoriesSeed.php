<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = $this->table('categories');
        $data = [
            ['id' =>  10000, 'level' => 1, 'name' => 'インターネット・コンピュータ'],
            ['id' =>  20000, 'level' => 1, 'name' => 'エンターテインメント'],
            ['id' =>  30000, 'level' => 1, 'name' => '生活・文化'],
            ['id' =>  40000, 'level' => 1, 'name' => '社会・経済'],
            ['id' =>  50000, 'level' => 1, 'name' => '健康と医療'],
            ['id' =>  60000, 'level' => 1, 'name' => 'ペット'],
            ['id' =>  70000, 'level' => 1, 'name' => 'グルメ'],
            ['id' =>  80000, 'level' => 1, 'name' => '住まい'],
            ['id' =>  90000, 'level' => 1, 'name' => '花・ガーデニング'],
            ['id' => 100000, 'level' => 1, 'name' => '育児'],
            ['id' => 110000, 'level' => 1, 'name' => '旅行・観光'],
            ['id' => 120000, 'level' => 1, 'name' => '写真'],
            ['id' => 130000, 'level' => 1, 'name' => '手芸・ハンドクラフト'],
            ['id' => 140000, 'level' => 1, 'name' => 'スポーツ'],
            ['id' => 150000, 'level' => 1, 'name' => 'アウトドア'],
            ['id' => 160000, 'level' => 1, 'name' => '美容・ビューティー'],
            ['id' => 170000, 'level' => 1, 'name' => 'ファッション'],
            ['id' => 180000, 'level' => 1, 'name' => '恋愛・結婚'],
            ['id' => 190000, 'level' => 1, 'name' => '趣味・ホビー'],
            ['id' => 200000, 'level' => 1, 'name' => 'ゲーム'],
            ['id' => 210000, 'level' => 1, 'name' => '乗り物'],
            ['id' => 220000, 'level' => 1, 'name' => '芸術・人文'],
            ['id' => 230000, 'level' => 1, 'name' => '学問・科学'],
            ['id' => 240000, 'level' => 1, 'name' => '日記・雑談'],
            ['id' => 250000, 'level' => 1, 'name' => 'ニュース'],
            ['id' => 260000, 'level' => 1, 'name' => '地域情報'],
        ];
        $table->insert($data)->save();
    }
}
