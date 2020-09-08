<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetallesPreVentasFixture
 *
 */
class DetallesPreVentasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_pre_venta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_producto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_color' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_tamanho' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cantidad' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'precio' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'descuento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_pre_venta' => ['type' => 'index', 'columns' => ['id_pre_venta'], 'length' => []],
            'id_producto' => ['type' => 'index', 'columns' => ['id_producto'], 'length' => []],
            'id_color' => ['type' => 'index', 'columns' => ['id_color'], 'length' => []],
            'id_tamanho' => ['type' => 'index', 'columns' => ['id_tamanho'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'detalles_pre_ventas_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_pre_venta'], 'references' => ['pre_ventas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'detalles_pre_ventas_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_producto'], 'references' => ['productos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'detalles_pre_ventas_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_color'], 'references' => ['colores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'detalles_pre_ventas_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_tamanho'], 'references' => ['tamanhos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_pre_venta' => 1,
            'id_producto' => 1,
            'id_color' => 1,
            'id_tamanho' => 1,
            'cantidad' => 1.5,
            'precio' => 1.5,
            'descuento' => 1,
            'estado' => 1
        ],
    ];
}
