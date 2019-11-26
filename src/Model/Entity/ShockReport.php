<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
/**
 * ShockReport Entity
 *
 * @property int $id
 * @property int|null $shock_type_id
 * @property string|null $shock_type_other
 * @property float $damage_amount
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $processed_date
 *
 * @property \App\Model\Entity\ShockType $shock_type
 * @property \App\Model\Entity\User $user
 */
class ShockReport extends Entity
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
        'shock_type_id' => true,
        'shock_type_other' => true,
        'damage_amount' => true,
        'user_id' => true,
        'created_date' => true,
        'processed_date' => true,
        'shock_type' => true,
        'user' => true
    ];
}
