<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShockTypes Model
 *
 * @property \App\Model\Table\ShockReportsTable|\Cake\ORM\Association\HasMany $ShockReports
 *
 * @method \App\Model\Entity\ShockType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShockType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShockType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShockType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShockType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShockType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShockType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShockType findOrCreate($search, callable $callback = null, $options = [])
 */
class ShockTypesTable extends Table
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

        $this->setTable('shock_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ShockReports', [
            'foreignKey' => 'shock_type_id'
        ]);
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false)
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
