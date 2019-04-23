<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $is_available
 * @property string $img_url
 * @property int $category_id
 * @property int $manufacturer_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Manufacturer $manufacturer
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Discount[] $discounts
 * @property \App\Model\Entity\Purchase[] $purchases
 * @property \App\Model\Entity\Review[] $reviews
 */
class Product extends Entity
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
        'price' => true,
        'is_available' => true,
        'img_url' => true,
        'category_id' => true,
        'manufacturer_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'manufacturer' => true,
        'user' => true,
        'discounts' => true,
        'purchases' => true,
        'reviews' => true
    ];
}
