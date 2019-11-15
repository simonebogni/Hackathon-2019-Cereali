<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoursTable Test Case
 */
class HoursTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HoursTable
     */
    public $Hours;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Hours',
        'app.Users',
        'app.Headquarters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Hours') ? [] : ['className' => HoursTable::class];
        $this->Hours = TableRegistry::getTableLocator()->get('Hours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hours);

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
