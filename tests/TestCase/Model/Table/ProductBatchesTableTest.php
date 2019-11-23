<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductBatchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductBatchesTable Test Case
 */
class ProductBatchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductBatchesTable
     */
    public $ProductBatches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductBatches',
        'app.Products',
        'app.Users',
        'app.ProductBatchPartitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductBatches') ? [] : ['className' => ProductBatchesTable::class];
        $this->ProductBatches = TableRegistry::getTableLocator()->get('ProductBatches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductBatches);

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
