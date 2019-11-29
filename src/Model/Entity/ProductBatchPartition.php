<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductBatchPartition Entity
 *
 * @property int $id
 * @property int $quantity_sale_goal
 * @property int|null $quantity_sale_effective
 * @property float $advised_sale_price
 * @property float|null $effective_sale_price
 * @property bool $focus_sale
 * @property float $extraordinary_loss_value
 * @property string|null $extraordinary_loss_type
 * @property \Cake\I18n\FrozenTime $creation_date
 * @property \Cake\I18n\FrozenTime|null $closed_date
 * @property int $product_batch_id
 * @property int $assigner_id
 * @property int $assignee_id
 *
 * @property \App\Model\Entity\ProductBatch $product_batch
 * @property \App\Model\Entity\User $user
 */
class ProductBatchPartition extends Entity
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
        'quantity_sale_effective' => true,
        'advised_sale_price' => true,
        'effective_sale_price' => true,
        'focus_sale' => true,
        'extraordinary_loss_value' => true,
        'extraordinary_loss_type' => true,
        'creation_date' => true,
        'closed_date' => true,
        'product_batch_id' => true,
        'assigner_id' => true,
        'assignee_id' => true,
        'product_batch' => true,
        'user' => true
    ];
}
