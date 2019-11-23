<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property string $id
 * @property string $name
 * @property string $role_type_id
 * @property int|null $department_id
 * @property string|null $product_area_id
 *
 * @property \App\Model\Entity\RoleType $role_type
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\ProductArea $product_area
 * @property \App\Model\Entity\User[] $users
 */
class Role extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'role_type_id' => true,
        'department_id' => true,
        'product_area_id' => true,
        'role_type' => true,
        'department' => true,
        'product_area' => true,
        'users' => true
    ];
}
