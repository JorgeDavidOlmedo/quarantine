<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetallesVenta Entity
 *
 * @property int $id
 * @property int $id_venta
 * @property int $id_producto
 * @property string $id_iva
 * @property float $cantidad
 * @property float $precio
 * @property int $ticket
 * @property int $nro_block
 * @property int $estado
 */
class DetallesVenta extends Entity
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
