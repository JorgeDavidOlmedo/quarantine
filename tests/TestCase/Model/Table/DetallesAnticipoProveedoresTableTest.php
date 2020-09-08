<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesAnticipoProveedoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesAnticipoProveedoresTable Test Case
 */
class DetallesAnticipoProveedoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesAnticipoProveedoresTable
     */
    public $DetallesAnticipoProveedores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_anticipo_proveedores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetallesAnticipoProveedores') ? [] : ['className' => 'App\Model\Table\DetallesAnticipoProveedoresTable'];
        $this->DetallesAnticipoProveedores = TableRegistry::get('DetallesAnticipoProveedores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesAnticipoProveedores);

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
