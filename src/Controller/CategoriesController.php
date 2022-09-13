<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @param string $topCategoryId トップカテゴリーID
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($topCategoryId)
    {
        $topCategory = TableRegistry::getTableLocator()
            ->get('TopCategories')
            ->get($topCategoryId);
        $categories = $this->Categories
            ->getCategories($topCategoryId);

        $this->set(compact('topCategory', 'categories'));
    }
}
