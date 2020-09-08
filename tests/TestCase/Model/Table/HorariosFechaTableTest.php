<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HorariosFechaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HorariosFechaTable Test Case
 */
class HorariosFechaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HorariosFechaTable
     */
    public $HorariosFecha;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.horarios_fecha',
        'app.fechas_curso',
        'app.cursos',
        'app.inscripciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HorariosFecha') ? [] : ['className' => 'App\Model\Table\HorariosFechaTable'];
        $this->HorariosFecha = TableRegistry::get('HorariosFecha', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HorariosFecha);

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
