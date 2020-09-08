<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cobro Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property int $id_local
 * @property \Cake\I18n\Time $fecha
 * @property string $documento
 * @property int $id_moneda
 * @property int $id_cliente
 * @property float $tipo_cambio
 * @property float $total
 * @property string $es_anticipo
 * @property int $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Cobro extends Entity
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
