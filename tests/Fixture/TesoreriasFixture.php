<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TesoreriasFixture
 *
 */
class TesoreriasFixture extends TestFixture
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
        'documento' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cuenta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_moneda' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'monto' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'observacion' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_venta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_compra' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_gasto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_local' => ['type' => 'index', 'columns' => ['id_local'], 'length' => []],
            'id_moneda' => ['type' => 'index', 'columns' => ['id_moneda'], 'length' => []],
            'id_empresa' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'id_venta' => ['type' => 'index', 'columns' => ['id_venta'], 'length' => []],
            'id_compra' => ['type' => 'index', 'columns' => ['id_compra'], 'length' => []],
            'id_cuenta' => ['type' => 'index', 'columns' => ['id_cuenta'], 'length' => []],
            'id_gasto' => ['type' => 'index', 'columns' => ['id_gasto'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'tesorerias_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_local'], 'references' => ['locales', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tesorerias_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_moneda'], 'references' => ['monedas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tesorerias_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tesorerias_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_venta'], 'references' => ['ventas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tesorerias_ibfk_6' => ['type' => 'foreign', 'columns' => ['id_compra'], 'references' => ['compras', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tesorerias_ibfk_7' => ['type' => 'foreign', 'columns' => ['id_cuenta'], 'references' => ['cuentas_tesorerias_bancos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tesorerias_ibfk_8' => ['type' => 'foreign', 'columns' => ['id_gasto'], 'references' => ['gastos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'documento' => 'Lorem ipsum dolor sit amet',
            'id_local' => 1,
            'id_cuenta' => 1,
            'id_moneda' => 1,
            'monto' => 1.5,
            'observacion' => 'Lorem ipsum dolor sit amet',
            'id_venta' => 1,
            'id_compra' => 1,
            'id_gasto' => 1,
            'estado' => 1
        ],
    ];
}
