<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetallesMovimientosBanco Entity
 *
 * @property int $id
 * @property int $id_movimiento_banco
 * @property int $semana
 * @property int $id_banco
 * @property string $cheque
 * @property \Cake\I18n\Time $vencimiento
 * @property float $monto
 * @property string $conciliado
 * @property \Cake\I18n\Time $fecha_conciliado
 * @property int $periodo
 * @property string $usuario
 * @property int $estado
 */
class DetallesMovimientosBanco extends Entity
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
