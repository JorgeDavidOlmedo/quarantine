<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesPreVentasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesPreVentasTable Test Case
 */
class DetallesPreVentasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesPreVentasTable
     */
    public $DetallesPreVentas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_pre_ventas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesPreVentas') ? [] : ['className' => 'App\Model\Table\DetallesPreVentasTable'];
        $this->DetallesPreVentas = TableRegistry::get('DetallesPreVentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesPreVentas);

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
