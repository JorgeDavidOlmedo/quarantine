<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlanDeCuenta Entity
 *
 * @property int $id
 * @property int $codigo
 * @property int $id_empresa
 * @property int $sintetica_1
 * @property int $sintetica_2
 * @property int $sintetica_3
 * @property int $sintetica_4
 * @property int $analitica
 * @property string $descripcion
 * @property string $tipo
 * @property string $clase
 * @property int $acumulador
 * @property int $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class PlanDeCuenta extends Entity
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
