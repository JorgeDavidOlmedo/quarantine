<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ConfiguracionContable Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property int $contra_cuenta
 * @property string $descripcion
 * @property int $id_plan_exenta
 * @property int $id_plan_5
 * @property int $id_iva_5
 * @property int $id_iva_10
 * @property int $id_plan_10
 * @property int $id_caja
 * @property int $id_pago
 * @property int $id_cobro
 * @property int $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ConfiguracionContable extends Entity
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
