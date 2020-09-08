<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesAnticipoClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesAnticipoClientesTable Test Case
 */
class DetallesAnticipoClientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesAnticipoClientesTable
     */
    public $DetallesAnticipoClientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_anticipo_clientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesAnticipoClientes') ? [] : ['className' => 'App\Model\Table\DetallesAnticipoClientesTable'];
        $this->DetallesAnticipoClientes = TableRegistry::get('DetallesAnticipoClientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesAnticipoClientes);

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
