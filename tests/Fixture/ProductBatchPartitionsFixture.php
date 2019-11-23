<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductBatchPartitionsFixture
 */
class ProductBatchPartitionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'quantity_sale_goal' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'advised_sale_price' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'focus_sale' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'extraordinary_loss_value' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'extraordinary_loss_type' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'creation_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => '', 'precision' => null],
        'closed_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'product_batch_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'assigner_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'assignee_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'assignee_id' => ['type' => 'index', 'columns' => ['assignee_id'], 'length' => []],
            'assigner_id' => ['type' => 'index', 'columns' => ['assigner_id'], 'length' => []],
            'product_batch_id' => ['type' => 'index', 'columns' => ['product_batch_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'product_batch_partitions_ibfk_1' => ['type' => 'foreign', 'columns' => ['assignee_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'product_batch_partitions_ibfk_2' => ['type' => 'foreign', 'columns' => ['assigner_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'product_batch_partitions_ibfk_3' => ['type' => 'foreign', 'columns' => ['product_batch_id'], 'references' => ['product_batches', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'quantity_sale_goal' => 1,
                'advised_sale_price' => 1.5,
                'focus_sale' => 1,
                'extraordinary_loss_value' => 1.5,
                'extraordinary_loss_type' => 'Lorem ipsum dolor sit amet',
                'creation_date' => '2019-11-22 12:44:44',
                'closed_date' => '2019-11-22 12:44:44',
                'product_batch_id' => 1,
                'assigner_id' => 1,
                'assignee_id' => 1
            ],
        ];
        parent::init();
    }
}
