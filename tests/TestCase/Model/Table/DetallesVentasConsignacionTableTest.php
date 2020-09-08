<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesVentasConsignacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesVentasConsignacionTable Test Case
 */
class DetallesVentasConsignacionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesVentasConsignacionTable
     */
    public $DetallesVentasConsignacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_ventas_consignacion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesVentasConsignacion') ? [] : ['className' => 'App\Model\Table\DetallesVentasConsignacionTable'];
        $this->DetallesVentasConsignacion = TableRegistry::get('DetallesVentasConsignacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesVentasConsignacion);

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
