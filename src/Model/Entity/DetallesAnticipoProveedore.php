<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetallesAnticipoProveedore Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property int $id_anticipo
 * @property int $id_compra
 * @property float $monto_utilizado
 * @property int $estado
 */
class DetallesAnticipoProveedore extends Entity
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
