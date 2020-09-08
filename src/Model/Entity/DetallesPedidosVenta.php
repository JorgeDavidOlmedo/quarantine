<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetallesPedidosVenta Entity
 *
 * @property int $id
 * @property int $id_pedido_venta
 * @property int $id_producto
 * @property int $cantidad
 * @property int $estado
 */
class DetallesPedidosVenta extends Entity
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
