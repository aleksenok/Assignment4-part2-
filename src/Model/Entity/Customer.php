<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $shipment_address
 * @property int $payment_method_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\PaymentMethod $payment_method
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Review[] $reviews
 */
class Customer extends Entity
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
        'shipment_address' => true,
        'payment_method_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'payment_method' => true,
        'user' => true,
        'reviews' => true
    ];
}
