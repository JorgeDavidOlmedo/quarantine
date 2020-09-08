<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FechasCursoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FechasCursoTable Test Case
 */
class FechasCursoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FechasCursoTable
     */
    public $FechasCurso;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fechas_curso',
        'app.cursos',
        'app.inscripciones',
        'app.horarios_fecha'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FechasCurso') ? [] : ['className' => 'App\Model\Table\FechasCursoTable'];
        $this->FechasCurso = TableRegistry::get('FechasCurso', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FechasCurso);

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
