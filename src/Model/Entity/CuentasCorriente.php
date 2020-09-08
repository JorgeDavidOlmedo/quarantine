<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CuentasCorriente Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property int $id_banco
 * @property int $id_moneda
 * @property string $descripcion
 * @property string $numero_cta_cte
 * @property string $gerente
 * @property string $observacion
 * @property string $tipo
 * @property int $id_plan_cuenta_diferida
 * @property int $id_plan_cuenta_compensada
 * @property int $estado
 */
class CuentasCorriente extends Entity
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
