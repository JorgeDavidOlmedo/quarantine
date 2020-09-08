<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AjustesExistenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AjustesExistenciasTable Test Case
 */
class AjustesExistenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AjustesExistenciasTable
     */
    public $AjustesExistencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ajustes_existencias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AjustesExistencias') ? [] : ['className' => 'App\Model\Table\AjustesExistenciasTable'];
        $this->AjustesExistencias = TableRegistry::get('AjustesExistencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AjustesExistencias);

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
