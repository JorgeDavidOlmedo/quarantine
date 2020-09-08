<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConfiguracionSistemaFixture
 *
 */
class ConfiguracionSistemaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'configuracion_sistema';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_empresa' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'anular_recibo' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'registro_continuo' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'registro_continuo_contabilidad' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'anular_asiento' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'modificacion_fecha_anterior' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'modificar_asiento_mes' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'ninguno', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'salario_minimo' => ['type' => 'decimal', 'length' => 20, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'jornal' => ['type' => 'decimal', 'length' => 20, 'precision' => 3, 'unsigned' => false, 'null' => false, 'default' => '0.000', 'comment' => ''],
        'retencion_x_jornal' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'porcentaje_retencion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'venta_rapida' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'caja', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'impresion' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'pantalla', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'diferencia_cambio' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'si', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'precio_medio' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'sin_iva', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'linkar_proveedor_producto' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'responsable_credito' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'aplicar_por_defecto' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'caja', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'cantidad_item_factura' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '20', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'salida_horario_almuerzo_reloj' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'si', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'notificar_stock_cero' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'no', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'contabilidad' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'general', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'formato_liquidacion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cobro_a_caja' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'si', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'id_empresa' => ['type' => 'index', 'columns' => ['id_empresa'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'configuracion_sistema_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_empresa'], 'references' => ['empresas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'anular_recibo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'registro_continuo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'registro_continuo_contabilidad' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'anular_asiento' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'modificacion_fecha_anterior' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'modificar_asiento_mes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'salario_minimo' => 1.5,
            'jornal' => 1.5,
            'retencion_x_jornal' => 1,
            'porcentaje_retencion' => 1,
            'venta_rapida' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'impresion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'diferencia_cambio' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'precio_medio' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'linkar_proveedor_producto' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'responsable_credito' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'aplicar_por_defecto' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'cantidad_item_factura' => 1,
            'salida_horario_almuerzo_reloj' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'notificar_stock_cero' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'contabilidad' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'formato_liquidacion' => 1,
            'cobro_a_caja' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
