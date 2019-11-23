<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductBatch Entity
 *
 * @property int $id
 * @property int $quantity_sale_goal
 * @property int $quantity_online_sale_goal
 * @property \Cake\I18n\FrozenTime $ordinary_reference_date
 * @property \Cake\I18n\FrozenTime $production_date
 * @property \Cake\I18n\FrozenTime $expiry_date
 * @property string|null $phytosanitary_information
 * @property string|null $packaging_provision
 * @property float $base_unit_price
 * @property \Cake\I18n\FrozenTime $creation_date
 * @property \Cake\I18n\FrozenTime|null $closed_date
 * @property int $product_id
 * @property int $assigner_id
 * @property int $assignee_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ProductBatchPartition[] $product_batch_partitions
 */
class ProductBatch extends Entity
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
        'quantity_sale_goal' => true,
        'quantity_online_sale_goal' => true,
        'ordinary_reference_date' => true,
        'production_date' => true,
        'expiry_date' => true,
        'phytosanitary_information' => true,
        'packaging_provision' => true,
        'base_unit_price' => true,
        'creation_date' => true,
        'closed_date' => true,
        'product_id' => true,
        'assigner_id' => true,
        'assignee_id' => true,
        'product' => true,
        'user' => true,
        'product_batch_partitions' => true
    ];
}
