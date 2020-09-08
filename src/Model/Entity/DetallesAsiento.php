<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetallesAsiento Entity
 *
 * @property int $id
 * @property int $id_asiento
 * @property int $id_plan_cuenta
 * @property float $debe
 * @property float $haber
 * @property int $estado
 *
 * @property \App\Model\Entity\Gasto[] $gastos
 */
class DetallesAsiento extends Entity
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
