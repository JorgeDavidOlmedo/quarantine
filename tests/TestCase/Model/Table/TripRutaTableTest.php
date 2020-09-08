<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TripRutaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TripRutaTable Test Case
 */
class TripRutaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TripRutaTable
     */
    public $TripRuta;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trip_ruta'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TripRuta') ? [] : ['className' => 'App\Model\Table\TripRutaTable'];
        $this->TripRuta = TableRegistry::get('TripRuta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TripRuta);

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
