<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistrarFlotaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistrarFlotaTable Test Case
 */
class RegistrarFlotaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistrarFlotaTable
     */
    public $RegistrarFlota;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.registrar_flota',
        'app.tipo_flotas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RegistrarFlota') ? [] : ['className' => 'App\Model\Table\RegistrarFlotaTable'];
        $this->RegistrarFlota = TableRegistry::get('RegistrarFlota', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RegistrarFlota);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
