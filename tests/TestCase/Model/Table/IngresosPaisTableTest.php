<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngresosPaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngresosPaisTable Test Case
 */
class IngresosPaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IngresosPaisTable
     */
    public $IngresosPais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingresos_pais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IngresosPais') ? [] : ['className' => 'App\Model\Table\IngresosPaisTable'];
        $this->IngresosPais = TableRegistry::get('IngresosPais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IngresosPais);

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
