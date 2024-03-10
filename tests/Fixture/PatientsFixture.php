<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PatientsFixture
 */
class PatientsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'created' => 1710085138,
                'modified' => 1710085138,
                'name' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'neighborhood' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => '',
                'phone' => 'Lorem ipsum do',
                'birth_date' => '2024-03-10',
                'marital_status' => 'Lorem ipsum dolor sit amet',
                'identity_number' => 'Lorem ipsum dolor ',
                'home_type' => 'Lorem ipsum dolor ',
                'workplace' => 'Lorem ipsum dolor sit amet',
                'family_income' => 1.5,
                'doctor' => 'Lorem ipsum dolor sit amet',
                'health_card_number' => 'Lorem ipsum dolor sit amet',
                'lfcc_date' => '2024-03-10',
                'affected_organ' => 'Lorem ipsum dolor sit amet',
                'date_of_death' => '2024-03-10',
            ],
        ];
        parent::init();
    }
}
