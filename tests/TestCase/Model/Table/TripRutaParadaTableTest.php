<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TripRutaParadaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TripRutaParadaTable Test Case
 */
class TripRutaParadaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TripRutaParadaTable
     */
    public $TripRutaParada;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('TripRutaParada') ? [] : ['className' => 'App\Model\Table\TripRutaParadaTable'];
        $this->TripRutaParada = TableRegistry::get('TripRutaParada', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TripRutaParada);

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
