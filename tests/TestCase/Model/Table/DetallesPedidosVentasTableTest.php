<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesPedidosVentasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesPedidosVentasTable Test Case
 */
class DetallesPedidosVentasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesPedidosVentasTable
     */
    public $DetallesPedidosVentas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_pedidos_ventas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesPedidosVentas') ? [] : ['className' => 'App\Model\Table\DetallesPedidosVentasTable'];
        $this->DetallesPedidosVentas = TableRegistry::get('DetallesPedidosVentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesPedidosVentas);

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
