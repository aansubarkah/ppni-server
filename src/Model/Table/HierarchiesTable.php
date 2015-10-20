<?php
namespace App\Model\Table;

use App\Model\Entity\Hierarchy;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hierarchies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentHierarchies
 * @property \Cake\ORM\Association\HasMany $ChildHierarchies
 */
class HierarchiesTable extends Table
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

        $this->table('hierarchies');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('ParentHierarchies', [
            'className' => 'Hierarchies',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildHierarchies', [
            'className' => 'Hierarchies',
            'foreignKey' => 'parent_id'
        ]);
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->add('active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentHierarchies'));
        return $rules;
    }
}
