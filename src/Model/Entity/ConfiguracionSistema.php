<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ConfiguracionSistema Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property string $anular_recibo
 * @property string $registro_continuo
 * @property string $registro_continuo_contabilidad
 * @property string $anular_asiento
 * @property string $modificacion_fecha_anterior
 * @property string $modificar_asiento_mes
 * @property float $salario_minimo
 * @property float $jornal
 * @property int $retencion_x_jornal
 * @property int $porcentaje_retencion
 * @property string $venta_rapida
 * @property string $impresion
 * @property string $diferencia_cambio
 * @property string $precio_medio
 * @property string $linkar_proveedor_producto
 * @property string $responsable_credito
 * @property string $aplicar_por_defecto
 * @property int $cantidad_item_factura
 * @property string $salida_horario_almuerzo_reloj
 * @property string $notificar_stock_cero
 * @property string $contabilidad
 * @property int $formato_liquidacion
 * @property string $cobro_a_caja
 */
class ConfiguracionSistema extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
