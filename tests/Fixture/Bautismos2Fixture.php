<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * Bautismos2Fixture
 *
 */
class Bautismos2Fixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bautismos2';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'libro' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'folio' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'numero' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dia_bautismo' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'presbitero' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bautizo_a' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nacio_en' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'el_dia' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'hijo' => ['type' => 'string', 'length' => 18, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'de_don' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'donha' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'padrino' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'madrina' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nota_marginal' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'libro' => 'Lorem ip',
            'folio' => 'Lorem ip',
            'numero' => 'Lorem ip',
            'dia_bautismo' => '2020-09-27',
            'presbitero' => 'Lorem ipsum dolor sit amet',
            'bautizo_a' => 'Lorem ipsum dolor sit amet',
            'nacio_en' => 'Lorem ipsum dolor sit amet',
            'el_dia' => '2020-09-27',
            'hijo' => 'Lorem ipsum dolo',
            'de_don' => 'Lorem ipsum dolor sit amet',
            'donha' => 'Lorem ipsum dolor sit amet',
            'padrino' => 'Lorem ipsum dolor sit amet',
            'madrina' => 'Lorem ipsum dolor sit amet',
            'nota_marginal' => 'Lorem ipsum dolor sit amet',
            'estado' => 1
        ],
    ];
}
