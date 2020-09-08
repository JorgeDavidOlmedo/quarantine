<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TripAsignacionViajeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TripAsignacionViajeTable Test Case
 */
class TripAsignacionViajeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TripAsignacionViajeTable
     */
    public $TripAsignacionViaje;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trip_asignacion_viaje'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TripAsignacionViaje') ? [] : ['className' => 'App\Model\Table\TripAsignacionViajeTable'];
        $this->TripAsignacionViaje = TableRegistry::get('TripAsignacionViaje', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TripAsignacionViaje);

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
