<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $id
 * @property string $codigo_interno
 * @property string $descripcion
 * @property string $informacion
 * @property string $informacion_adicional
 * @property int $id_empresa
 * @property string $iva
 * @property int $id_grupo
 * @property int $id_unidad_compra
 * @property int $embalaje
 * @property int $id_unidad
 * @property float $precio_costo
 * @property int $ganancia_porcentaje
 * @property float $ganancia_monto
 * @property float $precio_venta
 * @property float $precio_medio
 * @property float $precio_medio_reporte
 * @property float $precio_medio_venta
 * @property int $stock_minimo
 * @property int $tipo_producto
 * @property int $regimen_turismo
 * @property float $descuento
 * @property string $ticket
 * @property string $control_ticket
 * @property float $existencia
 * @property int $id_proveedor
 * @property int $comision
 * @property int $estado
 * @property string $clase
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Producto extends Entity
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
