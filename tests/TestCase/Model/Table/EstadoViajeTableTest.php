<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadoViajeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadoViajeTable Test Case
 */
class EstadoViajeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadoViajeTable
     */
    public $EstadoViaje;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estado_viaje'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EstadoViaje') ? [] : ['className' => 'App\Model\Table\EstadoViajeTable'];
        $this->EstadoViaje = TableRegistry::get('EstadoViaje', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EstadoViaje);

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
