<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tesoreria Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property string $descripcion
 * @property \Cake\I18n\Time $fecha
 * @property string $documento
 * @property int $id_local
 * @property int $id_cuenta
 * @property int $id_moneda
 * @property float $monto
 * @property string $observacion
 * @property int $id_venta
 * @property int $id_compra
 * @property int $id_gasto
 * @property int $estado
 */
class Tesoreria extends Entity
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
