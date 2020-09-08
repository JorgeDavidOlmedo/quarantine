<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proveedore Entity
 *
 * @property int $id
 * @property string $codigo_interno
 * @property int $id_empresa
 * @property string $descripcion
 * @property string $email
 * @property string $documento
 * @property string $dv
 * @property string $telefono
 * @property string $direccion
 * @property bool $estado
 * @property int $id_plan_cuenta
 * @property \Cake\I18n\Time $fecha_nacimiento
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Proveedore extends Entity
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
