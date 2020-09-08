<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovimientosBancosFixture
 *
 */
class MovimientosBancosFixture extends TestFixture
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
        'descripcion' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'id_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cuenta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cta_cte' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_moneda' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_pago' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cuenta_fondo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'documento' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_documento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'monto' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'observacion' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'estado_movimiento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'confirmado', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_local' => ['type' => 'index', 'columns' => ['id_local'], 'length' => []],
            'id_cuenta' => ['type' => 'index', 'columns' => ['id_cuenta'], 'length' => []],
            'id_moneda' => ['type' => 'index', 'columns' => ['id_moneda'], 'length' => []],
            'id_empresa' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'id_cta_cte' => ['type' => 'index', 'columns' => ['id_cta_cte'], 'length' => []],
            'id_pago' => ['type' => 'index', 'columns' => ['id_pago'], 'length' => []],
            'id_cuenta_fondo' => ['type' => 'index', 'columns' => ['id_cuenta_fondo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'movimientos_bancos_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_local'], 'references' => ['locales', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimientos_bancos_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_cuenta'], 'references' => ['cuentas_tesorerias_bancos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimientos_bancos_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_moneda'], 'references' => ['monedas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimientos_bancos_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimientos_bancos_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_cta_cte'], 'references' => ['cuentas_corrientes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimientos_bancos_ibfk_6' => ['type' => 'foreign', 'columns' => ['id_pago'], 'references' => ['pagos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimientos_bancos_ibfk_7' => ['type' => 'foreign', 'columns' => ['id_cuenta_fondo'], 'references' => ['movimiento_cuentas_fondos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'fecha' => '2019-09-24',
            'id_local' => 1,
            'id_cuenta' => 1,
            'id_cta_cte' => 1,
            'id_moneda' => 1,
            'id_pago' => 1,
            'id_cuenta_fondo' => 1,
            'documento' => 'Lorem ipsum dolor sit amet',
            'tipo_documento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'monto' => 1.5,
            'observacion' => 'Lorem ipsum dolor sit amet',
            'estado_movimiento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'estado' => 1
        ],
    ];
}
