<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VencimientosVenta Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha
 * @property int $id_venta
 * @property float $entrega
 * @property int $id_cliente
 * @property int $nro_cuota
 * @property string $tipo_credito
 * @property \Cake\I18n\Time $vencimiento
 * @property int $plazo
 * @property float $monto
 * @property float $cobro_monto
 * @property \Cake\I18n\Time $pago_fecha
 * @property int $id_empresa
 * @property string $tipo_vencimiento
 * @property float $total
 * @property float $tipo_cambio
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $estado
 */
class VencimientosVenta extends Entity
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