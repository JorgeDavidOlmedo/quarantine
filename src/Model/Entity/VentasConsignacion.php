<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VentasConsignacion Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha
 * @property int $id_empresa
 * @property int $id_costo
 * @property string $documento
 * @property int $id_moneda
 * @property int $id_cliente
 * @property int $id_local
 * @property int $id_deposito
 * @property string $timbrado
 * @property float $tipo_cambio
 * @property string $condicion
 * @property string $clasificacion
 * @property string $tipo_documento
 * @property string $pago
 * @property string $tipo_venta
 * @property string $regimen
 * @property string $sector
 * @property string $tipo_asiento
 * @property int $id_responsable
 * @property int $id_ajuste
 * @property int $id_produccion
 * @property float $total
 * @property int $estado
 * @property int $id_vendedor
 * @property float $vuelto
 * @property string $factura
 * @property string $descripcion_factura
 * @property int $id_transferencia
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class VentasConsignacion extends Entity
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
