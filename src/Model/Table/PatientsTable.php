<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @method \App\Model\Entity\Patient newEmptyEntity()
 * @method \App\Model\Entity\Patient newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('patients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 180)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('neighborhood')
            ->maxLength('neighborhood', 60)
            ->requirePresence('neighborhood', 'create')
            ->notEmptyString('neighborhood');

        $validator
            ->scalar('city')
            ->maxLength('city', 150)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 2)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 16)
            ->allowEmptyString('phone');

        $validator
            ->date('birth_date')
            ->requirePresence('birth_date', 'create')
            ->notEmptyDate('birth_date');

        $validator
            ->scalar('marital_status')
            ->allowEmptyString('marital_status');

        $validator
            ->scalar('identity_number')
            ->maxLength('identity_number', 20)
            ->requirePresence('identity_number', 'create')
            ->notEmptyString('identity_number');

        $validator
            ->scalar('home_type')
            ->maxLength('home_type', 20)
            ->requirePresence('home_type', 'create')
            ->notEmptyString('home_type');

        $validator
            ->scalar('workplace')
            ->maxLength('workplace', 80)
            ->allowEmptyString('workplace');

        $validator
            ->decimal('family_income')
            ->allowEmptyString('family_income');

        $validator
            ->scalar('doctor')
            ->maxLength('doctor', 80)
            ->requirePresence('doctor', 'create')
            ->notEmptyString('doctor');

        $validator
            ->scalar('health_card_number')
            ->maxLength('health_card_number', 80)
            ->requirePresence('health_card_number', 'create')
            ->notEmptyString('health_card_number');

        $validator
            ->date('lfcc_date')
            ->allowEmptyDate('lfcc_date');

        $validator
            ->scalar('affected_organ')
            ->maxLength('affected_organ', 255)
            ->allowEmptyString('affected_organ');

        $validator
            ->date('date_of_death')
            ->allowEmptyDate('date_of_death');

        return $validator;
    }

    public function beforeSave(\Cake\Event\EventInterface $event, \Cake\Datasource\EntityInterface $entity, \ArrayObject $options)
    {
        if (isset($entity->family_income) && $entity->family_income) {
            // Remove pontos de separação de milhares e substitui vírgula decimal por ponto
            $entity->family_income = $this->convertToFloat($entity->family_income);
        }

        return true;
    }

    protected function convertToFloat($value)
    {
        // Primeiro, remova os pontos de separação de milhares
        $value = str_replace('.', '', $value);
        // Depois, substitua a vírgula por ponto
        $value = str_replace(',', '.', $value);
        // Converte a string para float
        return (float) $value;
    }
}
