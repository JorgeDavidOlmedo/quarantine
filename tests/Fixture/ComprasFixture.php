<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComprasFixture
 *
 */
class ComprasFixture extends TestFixture
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
        'id_costo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_empresa' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'documento' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_moneda' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_proveedor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_deposito' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'timbrado' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_cambio' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '1.00', 'comment' => ''],
        'condicion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'clasificacion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'pago' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'tipo_compra' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'regimen' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'aplicar_a' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => 'ninguno', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'tipo_documento' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => 'factura', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'base_imponible' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'tipo_asiento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'directa', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'total' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'total_iva' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'id_existencia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_reposicion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_produccion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_ajuste' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exenta' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'id_cuenta_exenta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cuenta_exenta_contable' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gravada_5' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'iva_5' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'id_cuenta_5' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cuenta_5_contable' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gravada_10' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'iva_10' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'id_cuenta_10' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cuenta_10_contable' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sistema_iva' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'descripcion' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_contabilidad' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => 'contable', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'id_remision' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_existencia_inicial' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_transferencia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'estado' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_compras_1_idx' => ['type' => 'index', 'columns' => ['id_moneda'], 'length' => []],
            'fk_compras_2_idx' => ['type' => 'index', 'columns' => ['id_proveedor'], 'length' => []],
            'fk_compras_3_idx' => ['type' => 'index', 'columns' => ['id_local'], 'length' => []],
            'fk_compras_4_idx' => ['type' => 'index', 'columns' => ['id_deposito'], 'length' => []],
            'fk_compras_5_idx' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
            'compras_ibfk_1' => ['type' => 'index', 'columns' => ['id_costo'], 'length' => []],
            'id_existencia' => ['type' => 'index', 'columns' => ['id_existencia'], 'length' => []],
            'id_reposicion' => ['type' => 'index', 'columns' => ['id_reposicion'], 'length' => []],
            'id_ajuste' => ['type' => 'index', 'columns' => ['id_ajuste'], 'length' => []],
            'id_cuenta_exenta' => ['type' => 'index', 'columns' => ['id_cuenta_exenta'], 'length' => []],
            'id_cuenta_5' => ['type' => 'index', 'columns' => ['id_cuenta_5'], 'length' => []],
            'id_cuenta_10' => ['type' => 'index', 'columns' => ['id_cuenta_10'], 'length' => []],
            'fec' => ['type' => 'index', 'columns' => ['fecha'], 'length' => []],
            'docu' => ['type' => 'index', 'columns' => ['documento'], 'length' => []],
            'id_remision' => ['type' => 'index', 'columns' => ['id_remision'], 'length' => []],
            'id_produccion' => ['type' => 'index', 'columns' => ['id_produccion'], 'length' => []],
            'id_existencia_inicial' => ['type' => 'index', 'columns' => ['id_existencia_inicial'], 'length' => []],
            'id_transferencia' => ['type' => 'index', 'columns' => ['id_transferencia'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'compras_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_costo'], 'references' => ['centro_costos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'compras_ibfk_10' => ['type' => 'foreign', 'columns' => ['id_existencia_inicial'], 'references' => ['productos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_11' => ['type' => 'foreign', 'columns' => ['id_transferencia'], 'references' => ['transferencias', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_existencia'], 'references' => ['productos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_reposicion'], 'references' => ['reposiciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_ajuste'], 'references' => ['ajustes_existencias', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_5' => ['type' => 'foreign', 'columns' => ['id_cuenta_exenta'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_6' => ['type' => 'foreign', 'columns' => ['id_cuenta_5'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_7' => ['type' => 'foreign', 'columns' => ['id_cuenta_10'], 'references' => ['plan_de_cuentas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_8' => ['type' => 'foreign', 'columns' => ['id_remision'], 'references' => ['remisiones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'compras_ibfk_9' => ['type' => 'foreign', 'columns' => ['id_produccion'], 'references' => ['producciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_compras_1' => ['type' => 'foreign', 'columns' => ['id_moneda'], 'references' => ['monedas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_compras_2' => ['type' => 'foreign', 'columns' => ['id_proveedor'], 'references' => ['proveedores', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_compras_3' => ['type' => 'foreign', 'columns' => ['id_local'], 'references' => ['locales', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_compras_4' => ['type' => 'foreign', 'columns' => ['id_deposito'], 'references' => ['depositos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_compras_5' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id_costo' => 1,
            'id_empresa' => 1,
            'documento' => 'Lorem ipsum dolor sit amet',
            'id_moneda' => 1,
            'id_proveedor' => 1,
            'id_local' => 1,
            'id_deposito' => 1,
            'timbrado' => 'Lorem ipsum dolor sit amet',
            'tipo_cambio' => 1.5,
            'condicion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'clasificacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'pago' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_compra' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'regimen' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'aplicar_a' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_documento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'base_imponible' => 1.5,
            'tipo_asiento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'total' => 1.5,
            'total_iva' => 1.5,
            'id_existencia' => 1,
            'id_reposicion' => 1,
            'id_produccion' => 1,
            'id_ajuste' => 1,
            'exenta' => 1.5,
            'id_cuenta_exenta' => 1,
            'id_cuenta_exenta_contable' => 1,
            'gravada_5' => 1.5,
            'iva_5' => 1.5,
            'id_cuenta_5' => 1,
            'id_cuenta_5_contable' => 1,
            'gravada_10' => 1.5,
            'iva_10' => 1.5,
            'id_cuenta_10' => 1,
            'id_cuenta_10_contable' => 1,
            'sistema_iva' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'tipo_contabilidad' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'id_remision' => 1,
            'id_existencia_inicial' => 1,
            'id_transferencia' => 1,
            'created' => '2019-07-18 15:29:41',
            'modified' => 1563478181,
            'estado' => 1
        ],
    ];
}
