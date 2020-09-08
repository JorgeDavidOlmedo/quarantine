<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InscripcionesFixture
 *
 */
class InscripcionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nombre_apellido' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cupos' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'curso_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha_curso_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'horario_fecha_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_inscripciones_cursos1_idx' => ['type' => 'index', 'columns' => ['curso_id'], 'length' => []],
            'fk_inscripciones_fechas_curso1_idx' => ['type' => 'index', 'columns' => ['fecha_curso_id'], 'length' => []],
            'fk_inscripciones_horarios_fecha1_idx' => ['type' => 'index', 'columns' => ['horario_fecha_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_inscripciones_cursos1' => ['type' => 'foreign', 'columns' => ['curso_id'], 'references' => ['cursos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_inscripciones_fechas_curso1' => ['type' => 'foreign', 'columns' => ['fecha_curso_id'], 'references' => ['fechas_curso', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_inscripciones_horarios_fecha1' => ['type' => 'foreign', 'columns' => ['horario_fecha_id'], 'references' => ['horarios_fecha', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'nombre_apellido' => 'Lorem ipsum dolor sit amet',
            'cupos' => 1,
            'curso_id' => 1,
            'fecha_curso_id' => 1,
            'horario_fecha_id' => 1
        ],
    ];
}
