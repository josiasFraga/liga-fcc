<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $name
 * @property string $address
 * @property string $neighborhood
 * @property string $city
 * @property string $state
 * @property string|null $phone
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property string|null $marital_status
 * @property string $identity_number
 * @property string $home_type
 * @property string|null $workplace
 * @property string|null $family_income
 * @property string $doctor
 * @property string $health_card_number
 * @property \Cake\I18n\FrozenDate|null $lfcc_date
 * @property string|null $affected_organ
 * @property \Cake\I18n\FrozenDate|null $date_of_death
 */
class Patient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'name' => true,
        'address' => true,
        'neighborhood' => true,
        'city' => true,
        'state' => true,
        'phone' => true,
        'birth_date' => true,
        'marital_status' => true,
        'identity_number' => true,
        'home_type' => true,
        'workplace' => true,
        'family_income' => true,
        'doctor' => true,
        'health_card_number' => true,
        'lfcc_date' => true,
        'affected_organ' => true,
        'date_of_death' => true,
    ];
}
