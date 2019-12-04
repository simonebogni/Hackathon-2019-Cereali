<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductBatches Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProductBatchPartitionsTable|\Cake\ORM\Association\HasMany $ProductBatchPartitions
 *
 * @method \App\Model\Entity\ProductBatch get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductBatch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductBatch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductBatch|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductBatch saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductBatch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBatch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBatch findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductBatchesTable extends Table
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

        $this->setTable('product_batches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Assigners', [
            'className' => 'Users',
            'foreignKey' => 'assigner_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Assignees', [
            'className' => 'Users',
            'foreignKey' => 'assignee_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProductBatchPartitions', [
            'foreignKey' => 'product_batch_id'
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
            ->integer('quantity_sale_effective')
            ->allowEmptyString('quantity_sale_effective');

        $validator
            ->integer('quantity_online_sale_goal')
            ->requirePresence('quantity_online_sale_goal', 'create')
            ->allowEmptyString('quantity_online_sale_goal', false);

        $validator
            ->integer('quantity_online_sale_effective')
            ->allowEmptyString('quantity_online_sale_effective');

        $validator
            ->dateTime('ordinary_reference_date')
            ->requirePresence('ordinary_reference_date', 'create')
            ->allowEmptyDateTime('ordinary_reference_date', false);

        $validator
            ->dateTime('production_date')
            ->requirePresence('production_date', 'create')
            ->allowEmptyDateTime('production_date', false);

        $validator
            ->dateTime('expiry_date')
            ->requirePresence('expiry_date', 'create')
            ->allowEmptyDateTime('expiry_date', false);

        $validator
            ->scalar('phytosanitary_information')
            ->allowEmptyString('phytosanitary_information');

        $validator
            ->scalar('packaging_provision')
            ->allowEmptyString('packaging_provision');

        $validator
            ->decimal('base_unit_price')
            ->requirePresence('base_unit_price', 'create')
            ->allowEmptyString('base_unit_price', false);

        $validator
            ->decimal('average_unit_price')
            ->allowEmptyString('average_unit_price');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['assigner_id'], 'Users'));
        $rules->add($rules->existsIn(['assignee_id'], 'Users'));

        return $rules;
    }
}
