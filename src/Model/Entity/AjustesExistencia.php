<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AjustesExistencia Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property \Cake\I18n\Time $fecha
 * @property int $id_producto
 * @property int $id_local
 * @property int $id_deposito
 * @property float $cantidad_real
 * @property int $id_consignacion
 * @property int $estado
 */
class AjustesExistencia extends Entity
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
