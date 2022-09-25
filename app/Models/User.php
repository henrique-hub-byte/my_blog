<?php 
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

         public function checarEmail($email){
            $this->db->query("SELECT email FROM users WHERE email =:e");
            $this->db->bind(":e", $email);
            
            if($this->db->resultado()){
                return true;
            }else{
                return false;
            }
        }
 
        public function armazenar($dados){
            
            $this->db->query(("INSERT INTO users(nome , email , senha ) VALUES (:nome, :email, :senha)"));

            $this->db->bind("nome",$dados['nome']);
            $this->db->bind("email",$dados['email']);
            $this->db->bind("senha",$dados['senha']);
            
            if($this->db->executa()){
                return true;
            }else{
                return false;
            }
            
        }

        public function checarLogin($email, $senha){
            $this->db->query("SELECT * FROM users WHERE email =:e");
            $this->db->bind(":e", $email);
            var_dump($this->db);
            if($this->db->resultado()){

                $resultado = $this->db->resultado();
                
                if(password_verify($senha, $resultado->senha)){
                    return $resultado;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        
        public function lerUserPorId($id){
            /* "SELECT * FROM users WHERE email =:e" */
            /* $query = 'SELECT id_posts  FROM posts WHERE id_posts =:id_posts';
            var_dump($query); */ 
            $this->db->query("SELECT * FROM users WHERE id_usuario =:id_usuario");
            $this->db->bind('id_usuario',$id); 
            
            return $this->db->resultado();
        }
        
    }
?>