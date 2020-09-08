<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VentasFixture
 *
 */
class VentasFixture extends TestFixture
{

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
        'id_costo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'documento' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_moneda' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cliente' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_deposito' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'timbrado' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_cambio' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '1.00', 'comment' => ''],
        'condicion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'clasificacion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'tipo_documento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'factura', 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'pago' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'tipo_venta' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'regimen' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'sector' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'privado', 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'tipo_asiento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'directa', 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'id_responsable' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_ajuste' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_produccion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'total' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_vendedor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vuelto' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'factura' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => 'normal', 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null],
        'descripcion_factura' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'dec8_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_transferencia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_compras_1_idx' => ['type' => 'index', 'columns' => ['id_moneda'], 'length' => []],
            'fk_compras_3_idx' => ['type' => 'index', 'columns' => ['id_local'], 'length' => []],
            'fk_compras_4_idx' => ['type' => 'index', 'columns' => ['id_deposito'], 'length' => []],
            'fk_compras_5_idx' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'fk_ventas_1_idx' => ['type' => 'index', 'columns' => ['id_cliente'], 'length' => []],
            'ventas_ibfk_1' => ['type' => 'index', 'columns' => ['id_costo'], 'length' => []],
            'id_responsable' => ['type' => 'index', 'columns' => ['id_responsable'], 'length' => []],
            'id_ajuste' => ['type' => 'index', 'columns' => ['id_ajuste'], 'length' => []],
            'id_vendedor' => ['type' => 'index', 'columns' => ['id_vendedor'], 'length' => []],
            'fec' => ['type' => 'index', 'columns' => ['fecha'], 'length' => []],
            'docu' => ['type' => 'index', 'columns' => ['documento'], 'length' => []],
            'id_produccion' => ['type' => 'index', 'columns' => ['id_produccion'], 'length' => []],
            'id_transferencia' => ['type' => 'index', 'columns' => ['id_transferencia'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ventas_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_10' => ['type' => 'foreign', 'columns' => ['id_produccion'], 'references' => ['producciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_11' => ['type' => 'foreign', 'columns' => ['id_transferencia'], 'references' => ['transferencias', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_costo'], 'references' => ['centro_costos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_moneda'], 'references' => ['monedas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_cliente'], 'references' => ['clientes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_local'], 'references' => ['locales', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_6' => ['type' => 'foreign', 'columns' => ['id_deposito'], 'references' => ['depositos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_7' => ['type' => 'foreign', 'columns' => ['id_responsable'], 'references' => ['responsables_creditos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_8' => ['type' => 'foreign', 'columns' => ['id_ajuste'], 'references' => ['ajustes_existencias', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ventas_ibfk_9' => ['type' => 'foreign', 'columns' => ['id_vendedor'], 'references' => ['usuarios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'dec8_swedish_ci'
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
            'documento' => 'Lorem ipsum dolor sit amet',
            'id_moneda' => 1,
            'id_cliente' => 1,
            'id_local' => 1,
            'id_deposito' => 1,
            'timbrado' => 'Lorem ipsum dolor sit amet',
            'tipo_cambio' => 1.5,
            'condicion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'clasificacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_documento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'pago' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_venta' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'regimen' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'sector' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_asiento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'id_responsable' => 1,
            'id_ajuste' => 1,
            'id_produccion' => 1,
            'total' => 1.5,
            'estado' => 1,
            'id_vendedor' => 1,
            'vuelto' => 1.5,
            'factura' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'descripcion_factura' => 'Lorem ipsum dolor sit amet',
            'id_transferencia' => 1,
            'created' => '2019-07-18 15:30:04',
            'modified' => 1563478204
        ],
    ];
}
