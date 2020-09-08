<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesPedidosConsignacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesPedidosConsignacionTable Test Case
 */
class DetallesPedidosConsignacionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesPedidosConsignacionTable
     */
    public $DetallesPedidosConsignacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_pedidos_consignacion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesPedidosConsignacion') ? [] : ['className' => 'App\Model\Table\DetallesPedidosConsignacionTable'];
        $this->DetallesPedidosConsignacion = TableRegistry::get('DetallesPedidosConsignacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesPedidosConsignacion);

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
