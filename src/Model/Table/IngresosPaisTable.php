<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IngresosPais Model
 *
 * @method \App\Model\Entity\IngresosPai get($primaryKey, $options = [])
 * @method \App\Model\Entity\IngresosPai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IngresosPai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IngresosPai|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IngresosPai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IngresosPai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IngresosPai findOrCreate($search, callable $callback = null)
 */
class IngresosPaisTable extends Table
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

        $this->table('ingresos_pais');
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

        /*$validator
            ->dateTime('fecha')
            ->allowEmpty('fecha');

        $validator
            ->allowEmpty('cedula');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('usuario');

        $validator
            ->integer('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');*/

        return $validator;
    }
}
