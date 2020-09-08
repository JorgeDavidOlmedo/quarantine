<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VentasTmp Entity
 *
 * @property int $id
 * @property int $id_compra
 * @property int $fecha
 * @property string $documento
 * @property string $cliente
 * @property float $total
 * @property float $pagado
 * @property float $ganancia
 * @property string $estado_pago
 * @property int $id_empresa
 * @property int $id_user
 */
class VentasTmp extends Entity
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
