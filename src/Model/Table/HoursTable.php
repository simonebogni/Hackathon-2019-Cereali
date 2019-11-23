<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hours Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\HeadquartersTable|\Cake\ORM\Association\BelongsTo $Headquarters
 *
 * @method \App\Model\Entity\Hour get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hour|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hour saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hour findOrCreate($search, callable $callback = null, $options = [])
 */
class HoursTable extends Table
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

        $this->setTable('hours');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey(['user_id', 'go_in']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Headquarters', [
            'foreignKey' => 'headquarter_id',
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
            ->dateTime('go_in')
            ->allowEmptyDateTime('go_in', 'create');

        $validator
            ->dateTime('go_out')
            ->allowEmptyDateTime('go_out');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['headquarter_id'], 'Headquarters'));

        return $rules;
    }
}
