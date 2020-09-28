<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bautismos2 Model
 *
 * @method \App\Model\Entity\Bautismos2 get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bautismos2 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bautismos2[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bautismos2|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bautismos2 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bautismos2[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bautismos2 findOrCreate($search, callable $callback = null)
 */
class Bautismos2Table extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('bautismos2');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('libro');

        $validator
            ->allowEmpty('folio');

        $validator
            ->allowEmpty('numero');

        $validator
            ->date('dia_bautismo')
            ->allowEmpty('dia_bautismo');

        $validator
            ->allowEmpty('presbitero');

        $validator
            ->allowEmpty('bautizo_a');

        $validator
            ->allowEmpty('nacio_en');

        $validator
            ->date('el_dia')
            ->allowEmpty('el_dia');

        $validator
            ->allowEmpty('hijo');

        $validator
            ->allowEmpty('de_don');

        $validator
            ->allowEmpty('donha');

        $validator
            ->allowEmpty('padrino');

        $validator
            ->allowEmpty('madrina');

        $validator
            ->allowEmpty('nota_marginal');

        $validator
            ->integer('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        return $validator;
    }
}
