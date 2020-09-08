<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AgenteDocumentos
 * @property \Cake\ORM\Association\HasMany $TktCompraPasaje
 *
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, callable $callback = null)
 */
class EmpresasTable extends Table
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

        $this->table('empresas');
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
            ->allowEmpty('agente_nombre');

        $validator
            ->allowEmpty('agente_apellido');

        $validator
            ->allowEmpty('agente_nombre_empresa');

        $validator
            ->allowEmpty('agente_imagen_documento');

        $validator
            ->allowEmpty('agente_foto');

        $validator
            ->allowEmpty('agente_telefono');

        $validator
            ->allowEmpty('agente_celular');

        $validator
            ->allowEmpty('agente_email');

        $validator
            ->allowEmpty('agente_direccion_linea_1');

        $validator
            ->allowEmpty('agente_direccion_linea_2');

        $validator
            ->allowEmpty('agente_direccion_ciudad');

        $validator
            ->allowEmpty('agente_direccion_codigo_postal');

        $validator
            ->allowEmpty('agente_direccion_codigo_postal');

        $validator
            ->allowEmpty('agente_pais');

        $validator
            ->allowEmpty('status');

        return $validator;
    }


}
