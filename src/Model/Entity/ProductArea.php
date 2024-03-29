<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductArea Entity
 *
 * @property string $id
 * @property string $name
 *
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Role[] $roles
 */
class ProductArea extends Entity
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
        'products' => true,
        'roles' => true
    ];
}
