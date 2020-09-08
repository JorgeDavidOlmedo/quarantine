<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesTesoreriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesTesoreriasTable Test Case
 */
class DetallesTesoreriasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesTesoreriasTable
     */
    public $DetallesTesorerias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_tesorerias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesTesorerias') ? [] : ['className' => 'App\Model\Table\DetallesTesoreriasTable'];
        $this->DetallesTesorerias = TableRegistry::get('DetallesTesorerias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesTesorerias);

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
