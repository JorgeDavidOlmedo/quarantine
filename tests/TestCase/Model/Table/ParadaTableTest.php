<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParadaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParadaTable Test Case
 */
class ParadaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParadaTable
     */
    public $Parada;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parada',
        'app.trip_ruta',
        'app.punto_salida2',
        'app.punto_llegada2',
        'app.trip_ruta_parada'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Parada') ? [] : ['className' => 'App\Model\Table\ParadaTable'];
        $this->Parada = TableRegistry::get('Parada', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parada);

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
