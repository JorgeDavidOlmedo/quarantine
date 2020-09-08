<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PriPrecioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PriPrecioTable Test Case
 */
class PriPrecioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PriPrecioTable
     */
    public $PriPrecio;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pri_precio',
        'app.precios',
        'app.rutas',
        'app.vehiculo_tipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PriPrecio') ? [] : ['className' => 'App\Model\Table\PriPrecioTable'];
        $this->PriPrecio = TableRegistry::get('PriPrecio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PriPrecio);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
