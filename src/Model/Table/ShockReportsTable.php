<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShockReports Model
 *
 * @property \App\Model\Table\ShockTypesTable|\Cake\ORM\Association\BelongsTo $ShockTypes
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ShockReport get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShockReport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShockReport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShockReport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShockReport saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShockReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShockReport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShockReport findOrCreate($search, callable $callback = null, $options = [])
 */
class ShockReportsTable extends Table
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

        $this->setTable('shock_reports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ShockTypes', [
            'foreignKey' => 'shock_type_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('shock_type_other')
            ->maxLength('shock_type_other', 255)
            ->allowEmptyString('shock_type_other');

        $validator
            ->decimal('damage_amount')
            ->requirePresence('damage_amount', 'create')
            ->allowEmptyString('damage_amount', false);

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
        $rules->add($rules->existsIn(['shock_type_id'], 'ShockTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
