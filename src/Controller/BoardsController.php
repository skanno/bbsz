<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Boards Controller
 *
 * @property \App\Model\Table\BoardsTable $Boards
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoardsController extends AppController
{
    /**
     * Index method
     *
     * @param string $categoryId カテゴリID
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index(string $categoryId)
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $boards = $this->paginate(
            $this->Boards
                ->find()
                ->where(['category_id' => $categoryId])
        );

        $this->set(compact('categoryId', 'boards'));
    }

    /**
     * View method
     *
     * @param string|null $boardId Board id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($boardId)
    {
        $this->Posts = TableRegistry::getTableLocator()->get('Posts');
        $board = $this->Boards->get($boardId, [
            'contain' => ['Categories'],
        ]);

        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success('投稿しました。');

                return $this->redirect(['action' => 'view', $boardId]);
            }
            $this->Flash->error('投稿に失敗しました。');
        }

        $posts = $this->paginate(
            $this->Posts
                ->find()
                ->where(['board_id' => $boardId])
                ->order(['id' => 'DESC'])
        );
        $this->set(compact('board', 'post', 'posts'));
    }

    /**
     * Add method
     *
     * @param string $categoryId カテゴリID
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(string $categoryId)
    {
        $category = $this->Boards->Categories->get($categoryId);
        $board = $this->Boards->newEmptyEntity();
        if ($this->request->is('post')) {
            $board = $this->Boards->patchEntity($board, $this->request->getData());
            if ($this->Boards->save($board)) {
                $this->Flash->success('板を作成しました。');

                return $this->redirect(['action' => 'view', $board->id]);
            }
            $this->Flash->error('板の作成に失敗しました。');
        }
        $categories = $this->Boards->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('board', 'category'));
    }
}
