<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Caja Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha
 * @property int $id_cajero
 * @property int $id_empresa
 * @property string $documento
 * @property int $id_cuenta_caja
 * @property int $id_gasto
 * @property int $id_cliente
 * @property int $id_venta
 * @property int $id_proveedor
 * @property int $id_compra
 * @property int $id_cobro
 * @property int $id_moneda
 * @property float $monto
 * @property int $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Caja extends Entity
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
