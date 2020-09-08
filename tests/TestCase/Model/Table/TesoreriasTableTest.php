<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TesoreriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TesoreriasTable Test Case
 */
class TesoreriasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TesoreriasTable
     */
    public $Tesorerias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tesorerias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tesorerias') ? [] : ['className' => 'App\Model\Table\TesoreriasTable'];
        $this->Tesorerias = TableRegistry::get('Tesorerias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tesorerias);

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
