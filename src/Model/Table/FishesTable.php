<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fishes Model
 *
 * @method \App\Model\Entity\Fish get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fish newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fish[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fish|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fish patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fish[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fish findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FishesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fishes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('fish_email')
            ->requirePresence('fish_email', 'create')
            ->notEmpty('fish_email');

        $validator
            ->scalar('fish_password')
            ->requirePresence('fish_password', 'create')
            ->notEmpty('fish_password');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }
}
