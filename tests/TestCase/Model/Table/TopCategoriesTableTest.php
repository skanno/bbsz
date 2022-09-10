<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopCategoriesTable Test Case
 */
class TopCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TopCategoriesTable
     */
    protected $TopCategories;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TopCategories',
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TopCategories') ? [] : ['className' => TopCategoriesTable::class];
        $this->TopCategories = $this->getTableLocator()->get('TopCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TopCategories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TopCategoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
