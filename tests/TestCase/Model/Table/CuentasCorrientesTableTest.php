<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CuentasCorrientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CuentasCorrientesTable Test Case
 */
class CuentasCorrientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CuentasCorrientesTable
     */
    public $CuentasCorrientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cuentas_corrientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CuentasCorrientes') ? [] : ['className' => 'App\Model\Table\CuentasCorrientesTable'];
        $this->CuentasCorrientes = TableRegistry::get('CuentasCorrientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CuentasCorrientes);

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
