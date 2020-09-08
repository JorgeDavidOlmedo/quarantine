<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PedidoVenta Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property \Cake\I18n\Time $fecha
 * @property \Cake\I18n\Time $hora
 * @property int $correo
 * @property string $telefono
 * @property string $lugar_entrega
 * @property float $senha
 * @property int $id_pedido_producto
 * @property int $consignacion_treinta
 * @property int $consignacion_cincuenta
 * @property int $manijas
 * @property string $mesada
 * @property int $nro_maquina
 * @property string $acople
 * @property int $id_cliente
 * @property string $facturar_a
 * @property string $ruc
 * @property string $observacion
 * @property string $estado_pedido
 * @property int $estado
 */
class PedidoVenta extends Entity
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
