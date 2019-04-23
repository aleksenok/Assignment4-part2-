<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Discount[] $discounts
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Purchase[] $purchases
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
        'name' => true,
        'email' => true,
        'password' => true,
        'role_id' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'customers' => true,
        'discounts' => true,
        'products' => true,
        'purchases' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
     * SetPassword method to take the user to the dashboard upon login
     *
     * @return \Cake\Http\Response|null.
     * 
     * Hashes the password before saving it to the database
     */
    protected function _setPassword($value)
    {
        if (strlen($value) > 0) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
    }
}
