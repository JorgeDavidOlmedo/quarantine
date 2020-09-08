<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha
 * @property int $id_empresa
 * @property int $id_costo
 * @property int $id_compra
 * @property int $id_venta
 * @property float $precio_compra
 * @property float $precio_venta
 * @property int $id_proveedor
 * @property int $id_cliente
 * @property int $id_producto
 * @property string $iva
 * @property int $id_deposito
 * @property int $id_local
 * @property int $id_moneda
 * @property float $tipo_cambio
 * @property float $entrada
 * @property int $id_inventario
 * @property float $salida
 * @property string $confirmado
 * @property int $id_reposicion
 * @property int $id_produccion
 * @property int $id_ajuste
 * @property int $estado
 */
class Stock extends Entity
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
