<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class TopCategoriesSeed extends AbstractSeed
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

        $table = $this->table('top_categories');
        $data = [
            ['id' =>  1, 'sort' =>  1, 'name' => 'インターネット・コンピュータ'],
            ['id' =>  2, 'sort' =>  2, 'name' => 'エンターテインメント'],
            ['id' =>  3, 'sort' =>  3, 'name' => '生活・文化'],
            ['id' =>  4, 'sort' =>  4, 'name' => '社会・経済'],
            ['id' =>  5, 'sort' =>  5, 'name' => '健康と医療'],
            ['id' =>  6, 'sort' =>  6, 'name' => 'ペット'],
            ['id' =>  7, 'sort' =>  7, 'name' => 'グルメ'],
            ['id' =>  8, 'sort' =>  8, 'name' => '住まい'],
            ['id' =>  9, 'sort' =>  9, 'name' => '花・ガーデニング'],
            ['id' => 10, 'sort' => 10, 'name' => '育児'],
            ['id' => 11, 'sort' => 11, 'name' => '旅行・観光'],
            ['id' => 12, 'sort' => 12, 'name' => '写真'],
            ['id' => 13, 'sort' => 13, 'name' => '手芸・ハンドクラフト'],
            ['id' => 14, 'sort' => 14, 'name' => 'スポーツ'],
            ['id' => 15, 'sort' => 15, 'name' => 'アウトドア'],
            ['id' => 16, 'sort' => 16, 'name' => '美容・ビューティー'],
            ['id' => 17, 'sort' => 17, 'name' => 'ファッション'],
            ['id' => 18, 'sort' => 18, 'name' => '恋愛・結婚'],
            ['id' => 19, 'sort' => 19, 'name' => '趣味・ホビー'],
            ['id' => 20, 'sort' => 20, 'name' => 'ゲーム'],
            ['id' => 21, 'sort' => 21, 'name' => '乗り物'],
            ['id' => 22, 'sort' => 22, 'name' => '芸術・人文'],
            ['id' => 23, 'sort' => 23, 'name' => '学問・科学'],
            ['id' => 24, 'sort' => 24, 'name' => '日記・雑談'],
            ['id' => 25, 'sort' => 25, 'name' => 'ニュース'],
            ['id' => 26, 'sort' => 26, 'name' => '地域情報'],
        ];
        $table->insert($data)->save();
    }
}
