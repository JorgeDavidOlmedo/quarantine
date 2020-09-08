<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidoVentasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidoVentasTable Test Case
 */
class PedidoVentasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidoVentasTable
     */
    public $PedidoVentas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pedido_ventas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PedidoVentas') ? [] : ['className' => 'App\Model\Table\PedidoVentasTable'];
        $this->PedidoVentas = TableRegistry::get('PedidoVentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PedidoVentas);

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
