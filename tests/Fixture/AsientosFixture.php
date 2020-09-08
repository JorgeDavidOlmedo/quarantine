<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AsientosFixture
 *
 */
class AsientosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'documento' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'timbrado' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_movimiento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'asiento', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'sistema_iva' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'incluido', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'tipo_comprobante' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'factura', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'id_cliente' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_proveedor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_empresa' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'text', 'length' => 4294967295, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'descripcion_administrativa' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_cuenta_exenta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exenta' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'id_cuenta_5' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gravada_5' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'iva_5' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'id_cuenta_10' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gravada_10' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'iva_10' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'condicion' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'contado', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'tipo_asiento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'directa', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'id_compra' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'periodo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_venta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cobro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_pago' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_gasto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_detalle_mov_banco' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_cambio' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '1.00', 'comment' => ''],
        'regimen' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'total_iva' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'total' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_contabilidad' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => 'contable', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'estado_asiento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'confirmado', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'id_empresa' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'id_compra' => ['type' => 'index', 'columns' => ['id_compra'], 'length' => []],
            'id_venta' => ['type' => 'index', 'columns' => ['id_venta'], 'length' => []],
            'id_cobro' => ['type' => 'index', 'columns' => ['id_cobro'], 'length' => []],
            'id_pago' => ['type' => 'index', 'columns' => ['id_pago'], 'length' => []],
            'id_cuenta_exenta' => ['type' => 'index', 'columns' => ['id_cuenta_exenta'], 'length' => []],
            'id_cuenta_5' => ['type' => 'index', 'columns' => ['id_cuenta_5'], 'length' => []],
            'asientos_ibfk_10' => ['type' => 'index', 'columns' => ['id_cuenta_10'], 'length' => []],
            'asientos_ibfk_11' => ['type' => 'index', 'columns' => ['id_local'], 'length' => []],
            'id_cliente' => ['type' => 'index', 'columns' => ['id_cliente'], 'length' => []],
            'id_proveedor' => ['type' => 'index', 'columns' => ['id_proveedor'], 'length' => []],
            'fec' => ['type' => 'index', 'columns' => ['fecha'], 'length' => []],
            'docu' => ['type' => 'index', 'columns' => ['documento'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'asientos_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_10' => ['type' => 'foreign', 'columns' => ['id_cuenta_10'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_11' => ['type' => 'foreign', 'columns' => ['id_local'], 'references' => ['locales', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_12' => ['type' => 'foreign', 'columns' => ['id_cliente'], 'references' => ['clientes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'asientos_ibfk_13' => ['type' => 'foreign', 'columns' => ['id_proveedor'], 'references' => ['proveedores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'asientos_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_compra'], 'references' => ['compras', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_venta'], 'references' => ['ventas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_6' => ['type' => 'foreign', 'columns' => ['id_cobro'], 'references' => ['cobros', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_7' => ['type' => 'foreign', 'columns' => ['id_pago'], 'references' => ['pagos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_8' => ['type' => 'foreign', 'columns' => ['id_cuenta_exenta'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'asientos_ibfk_9' => ['type' => 'foreign', 'columns' => ['id_cuenta_5'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'fecha' => '2019-07-19',
            'documento' => 'Lorem ipsum dolor sit amet',
            'timbrado' => 'Lorem ipsum dolor sit amet',
            'tipo_movimiento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'sistema_iva' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_comprobante' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'id_cliente' => 1,
            'id_proveedor' => 1,
            'id_empresa' => 1,
            'id_local' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'descripcion_administrativa' => 'Lorem ipsum dolor sit amet',
            'id_cuenta_exenta' => 1,
            'exenta' => 1.5,
            'id_cuenta_5' => 1,
            'gravada_5' => 1.5,
            'iva_5' => 1.5,
            'id_cuenta_10' => 1,
            'gravada_10' => 1.5,
            'iva_10' => 1.5,
            'condicion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_asiento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'id_compra' => 1,
            'periodo' => 1,
            'id_venta' => 1,
            'id_cobro' => 1,
            'id_pago' => 1,
            'id_gasto' => 1,
            'id_detalle_mov_banco' => 1,
            'tipo_cambio' => 1.5,
            'regimen' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'total_iva' => 1.5,
            'total' => 1.5,
            'estado' => 1,
            'tipo_contabilidad' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'estado_asiento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2019-07-19 18:01:47',
            'modified' => 1563573707
        ],
    ];
}
