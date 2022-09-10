<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'top_category_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'sort' => 1,
                'created' => '2022-09-10 06:29:09',
                'modified' => '2022-09-10 06:29:09',
            ],
        ];
        parent::init();
    }
}
