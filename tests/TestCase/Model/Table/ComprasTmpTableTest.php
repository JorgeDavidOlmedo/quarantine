<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComprasTmpTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComprasTmpTable Test Case
 */
class ComprasTmpTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComprasTmpTable
     */
    public $ComprasTmp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.compras_tmp'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ComprasTmp') ? [] : ['className' => 'App\Model\Table\ComprasTmpTable'];
        $this->ComprasTmp = TableRegistry::get('ComprasTmp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ComprasTmp);

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
