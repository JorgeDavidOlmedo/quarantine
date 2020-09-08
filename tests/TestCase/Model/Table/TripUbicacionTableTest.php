<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TripUbicacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TripUbicacionTable Test Case
 */
class TripUbicacionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TripUbicacionTable
     */
    public $TripUbicacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trip_ubicacion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TripUbicacion') ? [] : ['className' => 'App\Model\Table\TripUbicacionTable'];
        $this->TripUbicacion = TableRegistry::get('TripUbicacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TripUbicacion);

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
