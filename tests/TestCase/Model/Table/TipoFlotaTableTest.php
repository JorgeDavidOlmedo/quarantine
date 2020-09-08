<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoFlotaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoFlotaTable Test Case
 */
class TipoFlotaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoFlotaTable
     */
    public $TipoFlota;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_flota'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoFlota') ? [] : ['className' => 'App\Model\Table\TipoFlotaTable'];
        $this->TipoFlota = TableRegistry::get('TipoFlota', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoFlota);

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
