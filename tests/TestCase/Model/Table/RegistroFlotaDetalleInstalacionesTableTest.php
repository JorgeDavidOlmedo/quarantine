<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistroFlotaDetalleInstalacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistroFlotaDetalleInstalacionesTable Test Case
 */
class RegistroFlotaDetalleInstalacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistroFlotaDetalleInstalacionesTable
     */
    public $RegistroFlotaDetalleInstalaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.registro_flota_detalle_instalaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RegistroFlotaDetalleInstalaciones') ? [] : ['className' => 'App\Model\Table\RegistroFlotaDetalleInstalacionesTable'];
        $this->RegistroFlotaDetalleInstalaciones = TableRegistry::get('RegistroFlotaDetalleInstalaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RegistroFlotaDetalleInstalaciones);

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
