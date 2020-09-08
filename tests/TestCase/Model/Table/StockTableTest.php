<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockTable Test Case
 */
class StockTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StockTable
     */
    public $Stock;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stock'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stock') ? [] : ['className' => 'App\Model\Table\StockTable'];
        $this->Stock = TableRegistry::get('Stock', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stock);

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
