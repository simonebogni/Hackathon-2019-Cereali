<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductAreasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductAreasTable Test Case
 */
class ProductAreasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductAreasTable
     */
    public $ProductAreas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductAreas',
        'app.Products',
        'app.Roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductAreas') ? [] : ['className' => ProductAreasTable::class];
        $this->ProductAreas = TableRegistry::getTableLocator()->get('ProductAreas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductAreas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
