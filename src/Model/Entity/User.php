<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $city
 * @property string $role_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Headquarters[] $headquarters
 * @property \App\Model\Entity\Hour[] $hours
 * @property \App\Model\Entity\ShockReport[] $shock_reports
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'city' => true,
        'role_id' => true,
        'role' => true,
        'headquarters' => true,
        'hours' => true,
        'shock_reports' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
