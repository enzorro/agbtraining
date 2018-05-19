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

    public function session_crear($usuario){
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
    
    public function session_existe($sesionID){
      // Leer la sesion
      $this->db->select('*');
      $this->db->from('sesione');
      $this->db->where("idsesion", $sesionID);
      // Hacemos la llamada
      $query = $this -> db -> get();
      // Comprobamos que tenemos resultado
      if($query -> num_rows() == 1){
        // Convertirmos en objeto el primer y unico resultado del array 
        $resultado = $query->result_object()[0];
        // La diferencia de tiempo pasado
        $tiempo_actual      = new DateTime();
        $tiempo_sesion      = new DateTime($resultado->fecha);
        $tiempo_diferencia  = $tiempo_actual->diff($tiempo_sesion);
        // Comprobamos la inactividad
        if($tiempo_diferencia->i > TIEMPO_SESION){
          // El tiempo a expirado la session
          return false;
        } else {
          // Si el tiempo de inactividad no ha pasado
          // actualizamos el tiempo 
          $data = array(
                    'fecha'     => date('Y-m-d H:i:s')
                  );
          $this->db->where('idsesion', $sesionID);
          $this->db->update('sesione', $data);
          // todo correcto
          return true;
        }
      } else {
        // No tenemos coincidencia
        return false;
      }
    }

    /* obtiene los usuarios con una consulta SQL que utiliza LIMIT para devolver una cantidad limitada de 5 */
    function get_usuarios($tipo){
      $this->db->select('*');
      $this->db->from('usuario');
      $this->db->where("tipo", $tipo);
      // Hacemos la llamada
      $query = $this->db->get();
      return $query->result_object();
    }

 }
  