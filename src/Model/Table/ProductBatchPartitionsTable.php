<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductBatchPartitions Model
 *
 * @property \App\Model\Table\ProductBatchesTable|\Cake\ORM\Association\BelongsTo $ProductBatches
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ProductBatchPartition get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductBatchPartition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductBatchPartition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductBatchPartition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductBatchPartition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductBatchPartition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBatchPartition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBatchPartition findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductBatchPartitionsTable extends Table
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

        $this->setTable('product_batch_partitions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ProductBatches', [
            'foreignKey' => 'product_batch_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'assigner_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'assignee_id',
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
            ->integer('quantity_sale_goal')
            ->requirePresence('quantity_sale_goal', 'create')
            ->allowEmptyString('quantity_sale_goal', false);

        $validator
            ->decimal('advised_sale_price')
            ->requirePresence('advised_sale_price', 'create')
            ->allowEmptyString('advised_sale_price', false);

        $validator
            ->boolean('focus_sale')
            ->requirePresence('focus_sale', 'create')
            ->allowEmptyString('focus_sale', false);

        $validator
            ->decimal('extraordinary_loss_value')
            ->requirePresence('extraordinary_loss_value', 'create')
            ->allowEmptyString('extraordinary_loss_value', false);

        $validator
            ->scalar('extraordinary_loss_type')
            ->maxLength('extraordinary_loss_type', 50)
            ->requirePresence('extraordinary_loss_type', 'create')
            ->allowEmptyString('extraordinary_loss_type', false);

        $validator
            ->dateTime('creation_date')
            ->requirePresence('creation_date', 'create')
            ->allowEmptyDateTime('creation_date', false);

        $validator
            ->dateTime('closed_date')
            ->allowEmptyDateTime('closed_date');

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
        $rules->add($rules->existsIn(['product_batch_id'], 'ProductBatches'));
        $rules->add($rules->existsIn(['assigner_id'], 'Users'));
        $rules->add($rules->existsIn(['assignee_id'], 'Users'));

        return $rules;
    }
}
