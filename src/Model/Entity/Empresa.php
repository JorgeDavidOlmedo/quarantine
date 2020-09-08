<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $id
 * @property string $agente_nombre
 * @property string $agente_apellido
 * @property string $agente_nombre_empresa
 * @property string $agente_documento_id
 * @property string $agente_imagen_documento
 * @property string $agente_foto
 * @property string $agente_telefono
 * @property string $agente_celular
 * @property string $agente_email
 * @property string $agente_direccion_linea_1
 * @property string $agente_direccion_linea_2
 * @property string $agente_direccion_ciudad
 * @property string $agente_direccion_codigo_postal
 * @property string $agente_pais
 * @property string $status
 *
 * @property \App\Model\Entity\AgenteDocumento $agente_documento
 * @property \App\Model\Entity\TktCompraPasaje[] $tkt_compra_pasaje
 */
class Empresa extends Entity
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
