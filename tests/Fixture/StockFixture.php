<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StockFixture
 *
 */
class StockFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stock';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'id_empresa' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_costo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_compra' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_venta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'precio_compra' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'precio_venta' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'id_proveedor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cliente' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_producto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'iva' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'id_deposito' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_moneda' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_cambio' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '1.00', 'comment' => ''],
        'entrada' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'id_inventario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'salida' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'confirmado' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => 'si', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'id_reposicion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_produccion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_ajuste' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_stock_1_idx' => ['type' => 'index', 'columns' => ['id_compra'], 'length' => []],
            'fk_stock_2_idx' => ['type' => 'index', 'columns' => ['id_proveedor'], 'length' => []],
            'fk_stock_3_idx' => ['type' => 'index', 'columns' => ['id_producto'], 'length' => []],
            'fk_stock_4_idx' => ['type' => 'index', 'columns' => ['id_deposito'], 'length' => []],
            'fk_stock_5_idx' => ['type' => 'index', 'columns' => ['id_local'], 'length' => []],
            'fk_stock_6_idx' => ['type' => 'index', 'columns' => ['id_moneda'], 'length' => []],
            'fk_stock_7_idx' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'id_venta' => ['type' => 'index', 'columns' => ['id_venta'], 'length' => []],
            'id_costo' => ['type' => 'index', 'columns' => ['id_costo'], 'length' => []],
            'id_cliente' => ['type' => 'index', 'columns' => ['id_cliente'], 'length' => []],
            'id_inventario' => ['type' => 'index', 'columns' => ['id_inventario'], 'length' => []],
            'id_reposicion' => ['type' => 'index', 'columns' => ['id_reposicion'], 'length' => []],
            'id_ajuste' => ['type' => 'index', 'columns' => ['id_ajuste'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'stock_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_costo'], 'references' => ['centro_costos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_10' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_11' => ['type' => 'foreign', 'columns' => ['id_inventario'], 'references' => ['inventarios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_12' => ['type' => 'foreign', 'columns' => ['id_reposicion'], 'references' => ['reposiciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_13' => ['type' => 'foreign', 'columns' => ['id_ajuste'], 'references' => ['ajustes_existencias', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_compra'], 'references' => ['compras', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_venta'], 'references' => ['ventas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_proveedor'], 'references' => ['proveedores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_cliente'], 'references' => ['clientes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_6' => ['type' => 'foreign', 'columns' => ['id_producto'], 'references' => ['productos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_7' => ['type' => 'foreign', 'columns' => ['id_local'], 'references' => ['locales', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_8' => ['type' => 'foreign', 'columns' => ['id_deposito'], 'references' => ['depositos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stock_ibfk_9' => ['type' => 'foreign', 'columns' => ['id_moneda'], 'references' => ['monedas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'fecha' => '2019-07-18',
            'id_empresa' => 1,
            'id_costo' => 1,
            'id_compra' => 1,
            'id_venta' => 1,
            'precio_compra' => 1.5,
            'precio_venta' => 1.5,
            'id_proveedor' => 1,
            'id_cliente' => 1,
            'id_producto' => 1,
            'iva' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'id_deposito' => 1,
            'id_local' => 1,
            'id_moneda' => 1,
            'tipo_cambio' => 1.5,
            'entrada' => 1.5,
            'id_inventario' => 1,
            'salida' => 1.5,
            'confirmado' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'id_reposicion' => 1,
            'id_produccion' => 1,
            'id_ajuste' => 1,
            'estado' => 1
        ],
    ];
}
