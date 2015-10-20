<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FromhierarchiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FromhierarchiesTable Test Case
 */
class FromhierarchiesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fromhierarchies',
        'app.dispositions',
        'app.letters',
        'app.users',
        'app.evidences',
        'app.senders',
        'app.vias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fromhierarchies') ? [] : ['className' => 'App\Model\Table\FromhierarchiesTable'];
        $this->Fromhierarchies = TableRegistry::get('Fromhierarchies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fromhierarchies);

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
