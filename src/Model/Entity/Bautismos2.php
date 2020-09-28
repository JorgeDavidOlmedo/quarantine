<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bautismos2 Entity
 *
 * @property int $id
 * @property string $libro
 * @property string $folio
 * @property string $numero
 * @property \Cake\I18n\Time $dia_bautismo
 * @property string $presbitero
 * @property string $bautizo_a
 * @property string $nacio_en
 * @property \Cake\I18n\Time $el_dia
 * @property string $hijo
 * @property string $de_don
 * @property string $donha
 * @property string $padrino
 * @property string $madrina
 * @property string $nota_marginal
 * @property int $estado
 */
class Bautismos2 extends Entity
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
