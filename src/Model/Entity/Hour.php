<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hour Entity
 *
 * @property int $user_id
 * @property int $headquarter_id
 * @property \Cake\I18n\FrozenTime $go_in
 * @property \Cake\I18n\FrozenTime $go_out
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Headquarters $headquarters
 */
class Hour extends Entity
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
        'headquarter_id' => true,
        'go_in' => true,
        'go_out' => true,
        'user_id' => true,
        'users' => true,
        'headquarters' => true
    ];
}
