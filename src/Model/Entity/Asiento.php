<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asiento Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha
 * @property string $documento
 * @property string $timbrado
 * @property string $tipo_movimiento
 * @property string $sistema_iva
 * @property string $tipo_comprobante
 * @property int $id_cliente
 * @property int $id_proveedor
 * @property int $id_empresa
 * @property int $id_local
 * @property string $descripcion
 * @property string $descripcion_administrativa
 * @property int $id_cuenta_exenta
 * @property float $exenta
 * @property int $id_cuenta_5
 * @property float $gravada_5
 * @property float $iva_5
 * @property int $id_cuenta_10
 * @property float $gravada_10
 * @property float $iva_10
 * @property string $condicion
 * @property string $tipo_asiento
 * @property int $id_compra
 * @property int $periodo
 * @property int $id_venta
 * @property int $id_cobro
 * @property int $id_pago
 * @property int $id_gasto
 * @property int $id_detalle_mov_banco
 * @property float $tipo_cambio
 * @property string $regimen
 * @property float $total_iva
 * @property float $total
 * @property int $estado
 * @property string $tipo_contabilidad
 * @property string $estado_asiento
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Gasto[] $gastos
 * @property \App\Model\Entity\AsientosGasto[] $asientos_gastos
 */
class Asiento extends Entity
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
