<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Timbrado Entity
 *
 * @property int $id
 * @property string $numero
 * @property \Cake\I18n\Time $fecha_desde
 * @property \Cake\I18n\Time $fecha_hasta
 * @property int $id_empresa
 * @property int $id_local
 * @property int $estado
 */
class Timbrado extends Entity
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
