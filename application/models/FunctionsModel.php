<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class FunctionsModel extends CI_Model{

    public $variable;

    public function __construct()
    {
        parent::__construct();
    }

#LOGIN#
    public function login($email,$password){
        $query = $this->db->query("SELECT * FROM usuarios WHERE EMAIL= '$email' AND PASWORD= '$password' ");
        $result = $query->result_array();
        if($result){
            return $result;
        }else{
            return false;
        }
        
    }
#LOGIN#

#CATALOGOS
    
    #SELECT QUERYS#

        //BANCOS
        public function get_bancos(){
            $query = $this->db->query('SELECT * FROM bancos');
            $result = $query->result_array();
            return $result;
        }

        //CUENTAS
        public function get_cuentas(){
            $query = $this->db->query('SELECT * FROM cuentas');
            $result = $query->result_array();
            return $result;
        }

        //PROVEEDORES
        public function get_proveedores(){
            $query = $this->db->query('SELECT * FROM proveedores');
            $result= $query->result_array();
            return $result;
        }

        public function proveedor($id){
            $query = $this->db->query("SELECT * FROM proveedores WHERE ID = '$id' ");
            $result= $query->result_array();
            return $result;

        }

        public function proveedor_rfc($proveedor){
            $query = $this->db->query("SELECT RFC FROM proveedores WHERE NOMBRE = '$proveedor' ");
            $result= $query->result_array();
            return $result;

        }

        //UNIDADES
        public function get_unidades(){
            $query = $this->db->query('SELECT * FROM unidades');
            $result= $query->result_array();
            return $result;
        }

        public function unidad($id){
            $query = $this->db->query("SELECT * FROM unidades WHERE ID = '$id' ");
            $result= $query->result_array();
            return $result;
        }

        public function getlastid_unidad(){
            $query=$this->db->query('SELECT ID FROM unidades ORDER BY ID DESC LIMIT 1');
            $result = $query->result_array();
            foreach($result as $row){
                return $row['ID'];
            }
            
        }

        //EMPLEADOS
        public function get_empleados(){
            $query = $this->db->query('SELECT * FROM empleados');
            $result= $query->result_array();
            return $result;
        }

        public function empleado($id){
            $query = $this->db->query("SELECT * FROM empleados WHERE ID = '$id' ");
            $result= $query->result_array();
            return $result;
        }

        //USUARIOS
        public function get_usuarios(){
            $query = $this->db->query('SELECT * FROM usuarios');
            $result= $query->result_array();
            return $result;
        }

        public function usuario($id){
            $query = $this->db->query("SELECT * FROM usuarios WHERE ID = '$id' ");
            $result= $query->result_array();
            return $result;
        }

        //FLUJOS
        public function get_flujos(){
            $query = $this->db->query('SELECT * FROM flujos');
            $result= $query->result_array();
            return $result;
        }

        public function flujo($id){
            $query = $this->db->query("SELECT * FROM flujos WHERE ID = '$id' ");
            $result= $query->result_array();
            return $result;
        }

        public function get_ingresos(){
            $query = $this->db->query("SELECT SUM(CANTIDAD) AS suming FROM flujos WHERE TIPO = 'INGRESO' ");
            $result= $query->row()->suming;
            return $result;

        }

        public function get_egresos(){
            $query = $this->db->query("SELECT SUM(CANTIDAD) AS sumegr FROM flujos WHERE TIPO = 'EGRESO' ");
            $result= $query->row()->sumegr;
            return $result;

        }

        //REQUISICIONES
        public function get_requisiciones(){
            $query = $this->db->query('SELECT * FROM requisiciones');
            $result= $query->result_array();
            return $result;
        }

        public function requisicion($id){
            $query = $this->db->query("SELECT * FROM requisiciones WHERE ID = '$id' ");
            $result= $query->result_array();
            return $result;
        }

        //ORDENES
        public function get_ordenes(){
            $query = $this->db->query('SELECT * FROM ordenes');
            $result= $query->result_array();
            return $result;
        }

        public function get_last_id_orden(){
            $query=$this->db->query('SELECT ID FROM ordenes ORDER BY ID DESC LIMIT 1');
            $result = $query->result_array();
            foreach($result as $row){
                return $row['ID'];
            }
        }

        public function orden($id){
            $query = $this->db->query("SELECT * FROM ordenes WHERE ID = '$id' ");
            $result= $query->result_array();
            return $result;
        }


    #SELECT QUERYS#
    
    #INSERT QUERYS#
        public function insert_banco($datos){
            $result = $this->db->insert('bancos',$datos);
            if($result){
            return $result;
                }else{
                    return false;
                }
        }

        public function insert_cuenta($datos){
            $result = $this->db->insert('cuentas',$datos);
            if($result){
            return $result;
                }else{
                    return false;
                }
        }

        public function insert_proveedor($datos){
            $result = $this->db->insert('proveedores',$datos);
            if($result){
            return $result;
                }else{
                    return false;
                }
        }

        public function insert_unidad($datos){
            $result = $this->db->insert('unidades',$datos);
            if($result){
            return $result;
            }else{
                return false;
            }
        }

        public function insert_empleado($datos){
            $result = $this->db->insert('empleados',$datos);
            if($result){
            return $result;
            }else{
                return false;
            }
        }

        public function insert_usuario($datos){
            $result = $this->db->insert('usuarios',$datos);
            if($result){
            return $result;
            }else{
                return false;
            }
        }

        public function insert_flujo($datos){
            $result = $this->db->insert('flujos',$datos);
            if($result){
            return $result;
            }else{
                return false;
            }
        }

        public function insert_requisicion($datos){
            $result = $this->db->insert('requisiciones',$datos);
            if($result){
            return $result;
            }else{
                return false;
            }
        }

        public function insert_orden($datos){
            $result = $this->db->insert('ordenes',$datos);
            if($result){
            return $result;
            }else{
                return false;
            }
        }


    #INSERT QUERYS#
    
    #UPDATE QUERYS#
    public function update_banco($banco,$id){
        $result = $this->db->set('BANCO',$banco);
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('bancos');
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function update_proveedor($datos,$id){
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('proveedores',$datos);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function update_unidad($datos,$id){
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('unidades',$datos);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function update_empleado($datos,$id){
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('empleados',$datos);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function update_usuario($datos,$id){
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('usuarios',$datos);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function update_flujo($datos,$id){
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('flujos',$datos);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function update_requisicion($datos,$id){
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('requisiciones',$datos);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function to_orden($req_id,$orden_id){
        $result = $this->db->set('orden',$orden_id);
        $result = $this->db->where('ID',$req_id);
        $result = $this->db->update('requisiciones');
        if($result){
            return true;
        }else{
            return false;
        }

    }

    public function update_orden($datos,$id){
        $result = $this->db->where('ID',$id);
        $result = $this->db->update('ordenes',$datos);
        if($result){
            return true;
        }else{
            return false;
        }  
    }
    #UPDATE QUERYS#

    #DELETE QUERYS#
        public function delete_bancos($id){
            $this->db->where('ID',$id);
            $result = $this->db->delete('bancos');
            if($result){
            return $result;
                }else{
                    return false;
                }
        }

        public function delete_cuentas($id){
            $this->db->where('ID',$id);
            $result = $this->db->delete('cuentas');
            if($result){
            return $result;
                }else{
                    return false;
                }
        }
        
        public function delete_proveedor($id){
            $this->db->where('ID',$id);
            $result = $this->db->delete('proveedores');
            if($result){
            return $result;
                }else{
                    return false;
                }
        }

        public function delete_unidad($datos){
            $this->db->where('ID',$datos);
            $result = $this->db->delete('unidades');
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function delete_empleado($datos){
            $this->db->where('ID',$datos);
            $result = $this->db->delete('empleados');
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function delete_usuario($datos){
            $this->db->where('ID',$datos);
            $result = $this->db->delete('usuarios');
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function delete_flujo($datos){
            $this->db->where('ID',$datos);
            $result = $this->db->delete('flujos');
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function delete_requisicion($datos){
            $this->db->where('ID',$datos);
            $result = $this->db->delete('requisiciones');
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function delete_orden($datos){
            $this->db->where('ID',$datos);
            $result = $this->db->delete('ordenes');
            if($result){
                return $result;
            }else{
                return false;
            }
        }



    #DELETE QUERYS#

#CATALOGOS



}


?>