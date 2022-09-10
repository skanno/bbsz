<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TopCategoriesFixture
 */
class TopCategoriesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'sort' => 1,
                'created' => '2022-09-10 06:28:04',
                'modified' => '2022-09-10 06:28:04',
            ],
        ];
        parent::init();
    }
}
