<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AsientosFlotaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AsientosFlotaTable Test Case
 */
class AsientosFlotaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AsientosFlotaTable
     */
    public $AsientosFlota;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.asientos_flota'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AsientosFlota') ? [] : ['className' => 'App\Model\Table\AsientosFlotaTable'];
        $this->AsientosFlota = TableRegistry::get('AsientosFlota', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AsientosFlota);

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
