<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Compra Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha
 * @property int $id_costo
 * @property int $id_empresa
 * @property string $documento
 * @property int $id_moneda
 * @property int $id_proveedor
 * @property int $id_local
 * @property int $id_deposito
 * @property string $timbrado
 * @property float $tipo_cambio
 * @property string $condicion
 * @property string $clasificacion
 * @property string $pago
 * @property string $tipo_compra
 * @property string $regimen
 * @property string $aplicar_a
 * @property string $tipo_documento
 * @property float $base_imponible
 * @property string $tipo_asiento
 * @property float $total
 * @property float $total_iva
 * @property int $id_existencia
 * @property int $id_reposicion
 * @property int $id_produccion
 * @property int $id_ajuste
 * @property float $exenta
 * @property int $id_cuenta_exenta
 * @property int $id_cuenta_exenta_contable
 * @property float $gravada_5
 * @property float $iva_5
 * @property int $id_cuenta_5
 * @property int $id_cuenta_5_contable
 * @property float $gravada_10
 * @property float $iva_10
 * @property int $id_cuenta_10
 * @property int $id_cuenta_10_contable
 * @property string $sistema_iva
 * @property string $descripcion
 * @property string $tipo_contabilidad
 * @property int $id_remision
 * @property int $id_existencia_inicial
 * @property int $id_transferencia
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $estado
 */
class Compra extends Entity
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
