<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesMovimientosBancosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesMovimientosBancosTable Test Case
 */
class DetallesMovimientosBancosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesMovimientosBancosTable
     */
    public $DetallesMovimientosBancos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_movimientos_bancos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesMovimientosBancos') ? [] : ['className' => 'App\Model\Table\DetallesMovimientosBancosTable'];
        $this->DetallesMovimientosBancos = TableRegistry::get('DetallesMovimientosBancos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesMovimientosBancos);

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
