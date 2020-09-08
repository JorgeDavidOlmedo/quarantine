<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CuentasCorrientesFixture
 *
 */
class CuentasCorrientesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_empresa' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_banco' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_moneda' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'numero_cta_cte' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'gerente' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'observacion' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'standar', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'id_plan_cuenta_diferida' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_plan_cuenta_compensada' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_moneda' => ['type' => 'index', 'columns' => ['id_moneda'], 'length' => []],
            'id_banco' => ['type' => 'index', 'columns' => ['id_banco'], 'length' => []],
            'id_empresa' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'id_plan_cuenta_diferida' => ['type' => 'index', 'columns' => ['id_plan_cuenta_diferida'], 'length' => []],
            'id_plan_cuenta_compensada' => ['type' => 'index', 'columns' => ['id_plan_cuenta_compensada'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cuentas_corrientes_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_moneda'], 'references' => ['monedas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cuentas_corrientes_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_banco'], 'references' => ['bancos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cuentas_corrientes_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cuentas_corrientes_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_plan_cuenta_diferida'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cuentas_corrientes_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_plan_cuenta_compensada'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'id_empresa' => 1,
            'id_banco' => 1,
            'id_moneda' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'numero_cta_cte' => 'Lorem ipsum dolor sit amet',
            'gerente' => 'Lorem ipsum dolor sit amet',
            'observacion' => 'Lorem ipsum dolor sit amet',
            'tipo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'id_plan_cuenta_diferida' => 1,
            'id_plan_cuenta_compensada' => 1,
            'estado' => 1
        ],
    ];
}
