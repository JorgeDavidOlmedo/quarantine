<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VentasTmpTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VentasTmpTable Test Case
 */
class VentasTmpTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VentasTmpTable
     */
    public $VentasTmp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ventas_tmp'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VentasTmp') ? [] : ['className' => 'App\Model\Table\VentasTmpTable'];
        $this->VentasTmp = TableRegistry::get('VentasTmp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VentasTmp);

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
