<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstalacionesFlotaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstalacionesFlotaTable Test Case
 */
class InstalacionesFlotaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstalacionesFlotaTable
     */
    public $InstalacionesFlota;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.instalaciones_flota'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstalacionesFlota') ? [] : ['className' => 'App\Model\Table\InstalacionesFlotaTable'];
        $this->InstalacionesFlota = TableRegistry::get('InstalacionesFlota', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstalacionesFlota);

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
