<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Cache\Cache;
use Cake\ORM\TableRegistry;

/**
 * Top Controller
 *
 * @method \App\Model\Entity\Top[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TopController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cacheKey = 'top_categories';
        $topCategories = Cache::read($cacheKey, 'top_categories');
        if (!$topCategories) {
            $topCategories = TableRegistry::getTableLocator()->get('TopCategories');
            $topCategories = $topCategories->find()
                ->contain(['Categories.Boards'])
                ->all();
            Cache::write($cacheKey, $topCategories, 'top_categories');
        }
        $this->set(compact('topCategories'));
    }
}
