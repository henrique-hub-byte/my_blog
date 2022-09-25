<?php 
    class Post {

        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function lerPosts(){
            $this->db->query("SELECT *,
             posts.id_posts as postID,
             posts.criado_em as postDataCadastro,
             users.id_usuario as usuarioId,
             users.criado_em as usuarioDataCadastro
             FROM posts
             INNER JOIN users ON
             posts.id_usuario = users.id_usuario
             ORDER BY posts.id_posts DESC
             ");
            
            return $this->db->resultados();
        }

        public function armazenar($dados){
            
            $this->db->query("INSERT INTO posts(id_usuario , titulo , texto ) VALUES (:id_usuario, :titulo, :texto)");
            
            
            $this->db->bind("id_usuario",$dados['id_usuario']);
            $this->db->bind("titulo",$dados['titulo']);
            $this->db->bind("texto",$dados['texto']);
            
            if($this->db->executa()):
                return true;
            else: 
                return false;
            endif;
        }

        public function lerPostPorId($id){
            /* "SELECT * FROM users WHERE email =:e" */
            /* $query = 'SELECT id_posts  FROM posts WHERE id_posts =:id_posts';
            var_dump($query); */ 
            $this->db->query("SELECT * FROM posts WHERE id_posts =:id_posts");
            $this->db->bind('id_posts',$id); 
            
            return $this->db->resultado();
        }

        public function atualizar($dados){
            
            $this->db->query("UPDATE posts SET  titulo = :titulo, texto = :texto WHERE id_posts =:id_posts");
            
            
            $this->db->bind("id_posts",$dados['id']);
            
            $this->db->bind("titulo",$dados['titulo']);
            $this->db->bind("texto",$dados['texto']);
            
            if($this->db->executa()):
                return true;
            else: 
                return false;
            endif;
        }

        public function destruir($id_posts){
            
            $this->db->query("DELETE FROM posts WHERE id_posts =:id_posts");
            
            
            $this->db->bind("id_posts",$id_posts);
            
            if($this->db->executa()):
                return true;
            else: 
                return false;
            endif;
        }
    }
?>  