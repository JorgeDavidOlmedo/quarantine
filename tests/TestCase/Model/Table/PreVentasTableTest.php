<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreVentasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreVentasTable Test Case
 */
class PreVentasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PreVentasTable
     */
    public $PreVentas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pre_ventas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PreVentas') ? [] : ['className' => 'App\Model\Table\PreVentasTable'];
        $this->PreVentas = TableRegistry::get('PreVentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PreVentas);

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
