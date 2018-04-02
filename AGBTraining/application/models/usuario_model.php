<?php
  Class Usuario_model extends CI_Model{
       
    public function get_login($email, $password){
      // Cogemos el cliente que tenga el mismo email
      $this->db->select('*');
      $this->db->from('usuario');
      $this->db->where("email", $email);
      // Hacemos la llamada
      $query = $this -> db -> get();
      // Comprobamos que tenemos resultado
      if($query -> num_rows() == 1){
        // Convertirmos en objeto el primer y unico resultado del array 
        $resultado = $query->result_object()[0];
        return $resultado;
      } else {
        // No tenemos coincidencia
        return false;
      }
    }

    public function create_session($usuario){
      // Cogemos los datos necesarios
      $data = array(
                    'idusuario' => $usuario->idusuario,
                    'fecha'     => date('Y-m-d H:i:s')
                  );
      // Almacenamos la sesion
      $this->db->insert('sesione', $data);
      // Retornamos el id de la sesion
      return $this->db->insert_id();
    }
    
 }
  