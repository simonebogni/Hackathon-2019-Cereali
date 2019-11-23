<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShockTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShockTypesTable Test Case
 */
class ShockTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShockTypesTable
     */
    public $ShockTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ShockTypes',
        'app.ShockReports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShockTypes') ? [] : ['className' => ShockTypesTable::class];
        $this->ShockTypes = TableRegistry::getTableLocator()->get('ShockTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShockTypes);

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
