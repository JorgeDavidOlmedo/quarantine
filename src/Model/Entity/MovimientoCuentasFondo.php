<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MovimientoCuentasFondo Entity
 *
 * @property int $id
 * @property int $id_empresa
 * @property int $id_cuenta_fondo
 * @property int $id_compra
 * @property int $id_venta
 * @property int $id_cobro
 * @property int $id_pago
 * @property int $id_caja
 * @property int $id_gasto
 * @property string $nro_cheque
 * @property string $serie
 * @property int $id_banco
 * @property string $descrip_banco
 * @property string $nro_vaucher
 * @property string $cuenta_bancaria
 * @property string $documento
 * @property \Cake\I18n\Time $fecha
 * @property int $semana
 * @property float $debe
 * @property float $haber
 * @property float $monto
 * @property int $estado
 */
class MovimientoCuentasFondo extends Entity
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
