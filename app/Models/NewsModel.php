<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class NewsModel extends Model {
        protected $table = 'news';

        protected $allowedFields = ['id', 'title', 'slug', 'body'];

        public function getNews($slug = false) {
            if ($slug === false) {
                return $this->findAll();
            }

            return $this->where(['slug' => $slug])->first();
        }

        /*public function getNewsById($newsId = null) {
            if ($newsId === null) {
                return $this->findAll();
            }

            return $this->where(['id' => $newsId])->first();
        }*/
    }