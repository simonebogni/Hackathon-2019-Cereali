<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShockReportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShockReportsTable Test Case
 */
class ShockReportsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShockReportsTable
     */
    public $ShockReports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ShockReports',
        'app.ShockTypes',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShockReports') ? [] : ['className' => ShockReportsTable::class];
        $this->ShockReports = TableRegistry::getTableLocator()->get('ShockReports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShockReports);

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
