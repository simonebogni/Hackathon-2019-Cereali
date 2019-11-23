<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeadquartersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeadquartersTable Test Case
 */
class HeadquartersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HeadquartersTable
     */
    public $Headquarters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Headquarters',
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
        $config = TableRegistry::getTableLocator()->exists('Headquarters') ? [] : ['className' => HeadquartersTable::class];
        $this->Headquarters = TableRegistry::getTableLocator()->get('Headquarters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Headquarters);

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
     * Test beforeFilter method
     *
     * @return void
     */
    public function testBeforeFilter()
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
