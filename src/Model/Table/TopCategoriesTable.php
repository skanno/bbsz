<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TopCategories Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\HasMany $Categories
 *
 * @method \App\Model\Entity\TopCategory newEmptyEntity()
 * @method \App\Model\Entity\TopCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TopCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TopCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\TopCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TopCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TopCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TopCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TopCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TopCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TopCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TopCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TopCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TopCategoriesTable extends Table
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

        $this->setTable('top_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Categories', [
            'foreignKey' => 'top_category_id',
        ]);
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('sort')
            ->notEmptyString('sort');

        return $validator;
    }
}
