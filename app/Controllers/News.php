<?php
    namespace App\Controllers;

    use App\Models\NewsModel;
    use CodeIgniter\Exceptions\PageNotFoundException;

    class News extends BaseController {

        //Controller p/ o index (lista de todas as notícias)
        public function index() {

            //Variável $model recebe um objeto da class NewsModel
            $model = model(NewsModel::class);

            $data = [
                'news' => $model->getNews(),
                'title' => 'News archive'
            ];

            return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
        }

        //Controller p/ mostrar determinada notícia
        public function show($slug = null) {

            //Variável $model recebe um objeto da class NewsModel
            $model = model(NewsModel::class);

            //Váriável $data recebe a notícia pelo métod getNews()
            $data['news'] = $model->getNews($slug);

            if (empty($data['news'])) {
                throw new PageNotFoundException('Cannot find the news item: ' . $slug);
            }
    
            $data['title'] = $data['news']['title'];
    
            return view('templates/header', $data)
                . view('news/view')
                . view('templates/footer');
        }

        //Cria o form para uma nova notícia
        public function new() {
            helper('form');

            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/create')
                . view('templates/footer');
        }

        //Controller p/ adicionar uma notícia (salva os dados do form, para o banco de dados)
        public function create() {
            helper('form');

            //Aqui pega os dados do formulário
            $data = $this->request->getPost(['title', 'body']);

            // Checks whether the submitted data passed the validation rules.
            if (! $this->validateData($data, [
                'title' => 'required|max_length[255]|min_length[3]',
                'body'  => 'required|max_length[5000]|min_length[10]',
            ])) {
                // The validation fails, so returns the form.
                return $this->new();
            }

            // Gets the validated data.
            $post = $this->validator->getValidated();

            /*echo "<pre>";
            var_dump($post);
            echo "</pre>";
            die();*/

            //Variável $model recebe um objeto da class NewsModel
            $model = model(NewsModel::class);

            $model->save([
                'title' => $post['title'],
                'slug'  => url_title($post['title'], '-', true),
                'body'  => $post['body'],
            ]);

            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/created_success')
                . view('templates/footer');
        }

        //Controller p/ editar uma notícia
        public function edit($slug = null) {
            helper('form');

            //$text = ['Edit news item'];

            $model = model(NewsModel::class);
            $data['news'] = $model->getNews($slug);

            if (empty($data['news'])) {
                throw new PageNotFoundException('Cannot find the news item: ' . $slug);
            }

            $data['title'] = $data['news']['title'];

            return view('templates/header', $data)
                . view('news/edit')
                . view('templates/footer');
        }

        public function update() {
            helper('form');

            $data = $this->request->getPost(['id', 'title', 'body']);

            // Checks whether the submitted data passed the validation rules.
            if (! $this->validateData($data, [
                'title' => 'required|max_length[255]|min_length[3]',
                'body'  => 'required|max_length[5000]|min_length[10]',
            ])) {
                // The validation fails, so returns the form.
                return $this->edit();
            }

            // Gets the validated data.
            $post = $this->validator->getValidated();            

            $model = model(NewsModel::class);

            $primary_key = $data['id'];
            //echo $primary_key;
            //echo "\n";            

            //1º modo de atualizar: método save()
            $model->save([
                'id' => $primary_key,
                'title' => $post['title'],
                'slug'  => url_title($post['title'], '-', true),
                'body'  => $post['body'],
            ]);

            //2º modo de atualizar: método update()
            /*$model->update($primary_key, $dados);

            $dados = [
                'title' => $post['title'],
                'slug'  => url_title($post['title'], '-', true),
                'body'  => $post['body'],
            ];*/

            //die();

            return view('templates/header', ['title' => 'Edit news item'])
                . view('news/updated_success')
                . view('templates/footer');
        }

        public function delete($slug = NULL) {
            $model = model(NewsModel::class);

            $data = $model->getNews($slug);

            //$model->where('id', $data['id'])->delete();
            $model->delete($data['id']);

            /*if (!$deleteNews) {
                throw new PageNotFoundException('Cannot find the news item: ' . $slug);
            }*/

            return view('templates/header')
                . view('news/deleted_success')
                . view('templates/footer');
        }
    }