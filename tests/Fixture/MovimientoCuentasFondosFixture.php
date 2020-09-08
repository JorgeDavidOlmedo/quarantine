<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovimientoCuentasFondosFixture
 *
 */
class MovimientoCuentasFondosFixture extends TestFixture
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
        'id_cuenta_fondo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_compra' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_venta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cobro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_pago' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_caja' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_gasto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nro_cheque' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'serie' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_banco' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'descrip_banco' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nro_vaucher' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cuenta_bancaria' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'documento' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'semana' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'debe' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'haber' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'monto' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'estado' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_movimiento_cuentas_fondos_1_idx' => ['type' => 'index', 'columns' => ['id_cuenta_fondo'], 'length' => []],
            'fk_movimiento_cuentas_fondos_2_idx' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'fk_movimiento_cuentas_fondos_3_idx' => ['type' => 'index', 'columns' => ['id_compra'], 'length' => []],
            'fk_movimiento_cuentas_fondos_4_idx' => ['type' => 'index', 'columns' => ['id_venta'], 'length' => []],
            'fk_movimiento_cuentas_fondos_5_idx' => ['type' => 'index', 'columns' => ['id_cobro'], 'length' => []],
            'fk_movimiento_cuentas_fondos_6_idx' => ['type' => 'index', 'columns' => ['id_pago'], 'length' => []],
            'fk_movimiento_cuentas_fondos_7_idx' => ['type' => 'index', 'columns' => ['id_banco'], 'length' => []],
            'id_caja' => ['type' => 'index', 'columns' => ['id_caja'], 'length' => []],
            'id_gasto' => ['type' => 'index', 'columns' => ['id_gasto'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'movimiento_cuentas_fondos_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_compra'], 'references' => ['compras', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_venta'], 'references' => ['ventas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_cobro'], 'references' => ['cobros', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_pago'], 'references' => ['pagos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_6' => ['type' => 'foreign', 'columns' => ['id_caja'], 'references' => ['cajas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_7' => ['type' => 'foreign', 'columns' => ['id_banco'], 'references' => ['bancos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_8' => ['type' => 'foreign', 'columns' => ['id_cuenta_fondo'], 'references' => ['cuentas_fondos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'movimiento_cuentas_fondos_ibfk_9' => ['type' => 'foreign', 'columns' => ['id_gasto'], 'references' => ['gastos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_empresa' => 1,
            'id_cuenta_fondo' => 1,
            'id_compra' => 1,
            'id_venta' => 1,
            'id_cobro' => 1,
            'id_pago' => 1,
            'id_caja' => 1,
            'id_gasto' => 1,
            'nro_cheque' => 'Lorem ipsum dolor sit amet',
            'serie' => 'Lorem ipsum dolor sit amet',
            'id_banco' => 1,
            'descrip_banco' => 'Lorem ipsum dolor sit amet',
            'nro_vaucher' => 'Lorem ipsum dolor sit amet',
            'cuenta_bancaria' => 'Lorem ipsum dolor sit amet',
            'documento' => 'Lorem ipsum dolor sit amet',
            'fecha' => '2019-07-19',
            'semana' => 1,
            'debe' => 1.5,
            'haber' => 1.5,
            'monto' => 1.5,
            'estado' => 1
        ],
    ];
}
