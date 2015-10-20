<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TohierarchiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TohierarchiesTable Test Case
 */
class TohierarchiesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tohierarchies',
        'app.dispositions',
        'app.letters',
        'app.users',
        'app.evidences',
        'app.senders',
        'app.vias',
        'app.fromhierarchies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tohierarchies') ? [] : ['className' => 'App\Model\Table\TohierarchiesTable'];
        $this->Tohierarchies = TableRegistry::get('Tohierarchies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tohierarchies);

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
