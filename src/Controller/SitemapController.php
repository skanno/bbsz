<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class SitemapController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->RequestHandler->respondAs('xml');
        $topCategories = TableRegistry::getTableLocator()
            ->get('TopCategories')
            ->getTopCategories();

        $this->set(compact('topCategories'));
    }
}
