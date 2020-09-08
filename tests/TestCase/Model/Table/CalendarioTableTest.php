<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalendarioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalendarioTable Test Case
 */
class CalendarioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CalendarioTable
     */
    public $Calendario;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calendario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Calendario') ? [] : ['className' => 'App\Model\Table\CalendarioTable'];
        $this->Calendario = TableRegistry::get('Calendario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calendario);

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
}
