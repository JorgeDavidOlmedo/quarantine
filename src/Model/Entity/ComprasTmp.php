<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ComprasTmp Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha
 * @property string $documento
 * @property string $proveedor
 * @property string $tipo
 * @property float $total
 * @property float $pagado
 * @property string $estado_pago
 * @property int $id_empresa
 * @property int $id_user
 */
class ComprasTmp extends Entity
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
