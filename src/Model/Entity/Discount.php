<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Discount Entity
 *
 * @property int $id
 * @property float $percentage
 * @property int $is_active
 * @property int $product_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\User $user
 */
class Discount extends Entity
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
        'percentage' => true,
        'is_active' => true,
        'product_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
        'user' => true
    ];
}
