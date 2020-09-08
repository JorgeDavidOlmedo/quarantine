<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VentasConsignacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VentasConsignacionTable Test Case
 */
class VentasConsignacionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VentasConsignacionTable
     */
    public $VentasConsignacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ventas_consignacion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VentasConsignacion') ? [] : ['className' => 'App\Model\Table\VentasConsignacionTable'];
        $this->VentasConsignacion = TableRegistry::get('VentasConsignacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VentasConsignacion);

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
