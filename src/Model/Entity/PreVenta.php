<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PreVenta Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property \Cake\I18n\Time $fecha
 * @property \Cake\I18n\Time $hora
 * @property int $id_usuario
 * @property int $id_producto
 * @property int $id_moneda
 * @property float $total
 * @property int $estado
 * @property string $estado_preventa
 */
class PreVenta extends Entity
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
