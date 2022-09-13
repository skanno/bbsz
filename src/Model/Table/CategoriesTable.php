<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\ORM\ResultSet;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \App\Model\Table\TopCategoriesTable&\Cake\ORM\Association\BelongsTo $TopCategories
 * @property \App\Model\Table\BoardsTable&\Cake\ORM\Association\HasMany $Boards
 * @method \App\Model\Entity\Category newEmptyEntity()
 * @method \App\Model\Entity\Category newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesTable extends Table
{
    /**
     * キャッシュ設定名
     *
     * @var string
     */
    private $cacheConfig = 'categories';

    /**
     * キャッシュキー
     *
     * @var string
     */
    private $cacheKey = 'categories';

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TopCategories', [
            'foreignKey' => 'top_category_id',
        ]);
        $this->hasMany('Boards', [
            'foreignKey' => 'category_id',
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
            ->integer('top_category_id')
            ->allowEmptyString('top_category_id');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('top_category_id', 'TopCategories'), ['errorField' => 'top_category_id']);

        return $rules;
    }

    /**
     * カテゴリを取得します。
     *
     * @param string $topCategoryId カテゴリーID
     * @return \Cake\ORM\ResultSet
     */
    public function getCategories(string $topCategoryId): ResultSet
    {
        $getData = function ($topCategoryId) {
            return $this->find()
                ->contain(['Boards'])
                ->where(['top_category_id' => $topCategoryId])
                ->all();
        };

        $categories = null;
        if (!Configure::read('debug')) {
            $cacheKey = $this->cacheKey . '_' . $topCategoryId;
            $categories = Cache::read($cacheKey, $this->cacheConfig);
            if (!$categories) {
                $categories = $getData($topCategoryId);
                Cache::write($cacheKey, $categories, $this->cacheConfig);
            }
        } else {
            $categories = $getData($topCategoryId);
        }

        return $categories;
    }
}
