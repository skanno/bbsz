<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\ORM\ResultSet;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TopCategories Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\HasMany $Categories
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
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TopCategoriesTable extends Table
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
    private $cacheKey = 'topCategories';

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

    /**
     * トップカテゴリを取得します。
     *
     * @return \Cake\ORM\ResultSet
     */
    public function getTopCategories(): ResultSet
    {
        $getData = function () {
            return $this->find()
                ->contain(['Categories.Boards'])
                ->order(['TopCategories.id'])
                ->all();
        };

        $topCategories = null;
        if (!Configure::read('debug')) {
            $topCategories = Cache::read($this->cacheKey, $this->cacheConfig);
            if (!$topCategories) {
                $topCategories = $getData();
                Cache::write($this->cacheKey, $topCategories, $this->cacheConfig);
            }
        } else {
            $topCategories = $getData();
        }

        return $topCategories;
    }
}
