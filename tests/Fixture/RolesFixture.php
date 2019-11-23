<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture
 */
class RolesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 3, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'role_type_id' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'department_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'product_area_id' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'department_id' => ['type' => 'index', 'columns' => ['department_id'], 'length' => []],
            'product_area_id' => ['type' => 'index', 'columns' => ['product_area_id'], 'length' => []],
            'role_type_id' => ['type' => 'index', 'columns' => ['role_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'name' => ['type' => 'unique', 'columns' => ['name'], 'length' => []],
            'roles_ibfk_1' => ['type' => 'foreign', 'columns' => ['department_id'], 'references' => ['departments', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'roles_ibfk_2' => ['type' => 'foreign', 'columns' => ['product_area_id'], 'references' => ['product_areas', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'roles_ibfk_3' => ['type' => 'foreign', 'columns' => ['role_type_id'], 'references' => ['role_types', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'id' => '46be9ce2-fdde-45ea-9364-d0e0a2e5d26f',
                'name' => 'Lorem ipsum dolor sit amet',
                'role_type_id' => 'L',
                'department_id' => 1,
                'product_area_id' => 'L'
            ],
        ];
        parent::init();
    }
}
