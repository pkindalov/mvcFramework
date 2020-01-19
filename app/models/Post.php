<?php
    class Post{
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getPosts(){
            $query = "SELECT * FROM posts";
            $this->db->query($query);

            return $this->db->resultSet();
        }
    }