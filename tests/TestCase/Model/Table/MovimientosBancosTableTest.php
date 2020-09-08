<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovimientosBancosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovimientosBancosTable Test Case
 */
class MovimientosBancosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovimientosBancosTable
     */
    public $MovimientosBancos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movimientos_bancos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MovimientosBancos') ? [] : ['className' => 'App\Model\Table\MovimientosBancosTable'];
        $this->MovimientosBancos = TableRegistry::get('MovimientosBancos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovimientosBancos);

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
