<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class FunctionsController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('FunctionsModel');
		$this->load->helper('url','database','form');
		
	}

	#LOGIN#
	public function login()
	{
		if(!empty(isset($_POST['email'])) && !empty(isset($_POST['password']))){

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			

			$result = $this->FunctionsModel->login($email,$password);
			$datos['data_user'] = $this->FunctionsModel->login($email,$password);

			if($result){
				$this->load->view('inicio',$datos);	
			}else{
				echo "<script>alert('Credenciales Invalidas');</script>";
				redirect('welcome/index');

			}

		}
	}
	#LOGIN#
#EXPORTAR A EXCEL
  	public function exportar_bancos() {

		
		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_bancos();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
        $sheet->setCellValue('B1', 'BANCO');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, $val['BANCO']);
            $rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'bancos.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		// $writer = IOFactory::createWriter($spreadsheet,'Xlsx');
		$writer->save('php://output');
		

		
		// redirect($_SERVER['DOCUMENT_ROOT'].'/upload/'.$filename);
		
        
	}
	
	public function exportar_cuentas() {

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_cuentas();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
		$sheet->setCellValue('B1', 'BANCO');
		$sheet->setCellValue('C1', 'CUENTA');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, $val['BANCO']);
			$sheet->setCellValue('C' . $rows, $val['CUENTA']);
			$rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'cuentas.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	
        
	}
	
	public function exportar_proveedores() {

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_proveedores();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
		$sheet->setCellValue('B1', 'NOMBRE');
		$sheet->setCellValue('C1', 'RAZON SOCIAL');
		$sheet->setCellValue('D1', 'RFC');
		$sheet->setCellValue('E1', 'CALLE');
		$sheet->setCellValue('F1', 'NO.EXT');
		$sheet->setCellValue('G1', 'NO.INT');
		$sheet->setCellValue('H1', 'COLONIA');
		$sheet->setCellValue('I1', 'C.P.');
		$sheet->setCellValue('J1', 'MUNICIPIO');
		$sheet->setCellValue('K1', 'ESTADO');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, $val['NOMBRE']);
			$sheet->setCellValue('C' . $rows, $val['RAZONSOCIAL']);
			$sheet->setCellValue('D' . $rows, $val['RFC']);
			$sheet->setCellValue('E' . $rows, $val['CALLE']);
			$sheet->setCellValue('F' . $rows, $val['NOEXT']);
			$sheet->setCellValue('G' . $rows, $val['NOINT']);
			$sheet->setCellValue('H' . $rows, $val['COLONIA']);
			$sheet->setCellValue('I' . $rows, $val['CP']);
			$sheet->setCellValue('J' . $rows, $val['MUNICIPIO']);
			$sheet->setCellValue('K' . $rows, $val['ESTADO']);
			$rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'Proveedores.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	
        
	}

	public function exportar_unidades() {

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_unidades();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
		$sheet->setCellValue('B1', 'ECONOMICO');
		$sheet->setCellValue('C1', 'MODELO');
		$sheet->setCellValue('D1', 'AÑO');
		$sheet->setCellValue('E1', 'TIPO');
		$sheet->setCellValue('F1', 'SERIE');
		$sheet->setCellValue('G1', 'PLACA');
		$sheet->setCellValue('H1', 'PLACA FISICA');
		$sheet->setCellValue('I1', 'COMBUSTIBLE');
		$sheet->setCellValue('J1', 'CAPACIDAD DE TANQUE');
		$sheet->setCellValue('K1', 'RENDIMIENTO');
		$sheet->setCellValue('L1', 'SERIE DE GPS');
		$sheet->setCellValue('M1', 'ESTATUS');
		$sheet->setCellValue('N1', 'FECHA');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, $val['ECONOMICO']);
			$sheet->setCellValue('C' . $rows, $val['MODELO']);
			$sheet->setCellValue('D' . $rows, $val['YEAR']);
			$sheet->setCellValue('E' . $rows, $val['TIPO']);
			$sheet->setCellValue('F' . $rows, $val['SERIE']);
			$sheet->setCellValue('G' . $rows, $val['PLACA']);
			$sheet->setCellValue('H' . $rows, $val['PF']);
			$sheet->setCellValue('I' . $rows, $val['COMBUSTIBLE']);
			$sheet->setCellValue('J' . $rows, $val['CTANQUE']);
			$sheet->setCellValue('K' . $rows, $val['RE']);
			$sheet->setCellValue('L' . $rows, $val['GPS']);
			$sheet->setCellValue('M' . $rows, $val['ESTATUS']);
			$sheet->setCellValue('N' . $rows, date('d-m-Y',strtotime($val['FECHA'])));
			$rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'Unidades.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	
        
	}

	public function exportar_empleados() {

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_empleados();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
		$sheet->setCellValue('B1', 'FOTO');
		$sheet->setCellValue('C1', 'FECHA DE INGRESO');
		$sheet->setCellValue('D1', 'NOMBRE');
		$sheet->setCellValue('E1', 'TIPO');
		$sheet->setCellValue('F1', 'CLASE');
		$sheet->setCellValue('G1', 'PUESTO');
		$sheet->setCellValue('H1', 'CALLE');
		$sheet->setCellValue('I1', 'NO.EXT');
		$sheet->setCellValue('J1', 'NO.INT');
		$sheet->setCellValue('K1', 'COLONIA');
		$sheet->setCellValue('L1', 'C.P.');
		$sheet->setCellValue('M1', 'MUNICIPIO');
		$sheet->setCellValue('N1', 'ESTADO');
		$sheet->setCellValue('O1', 'TELEFONO');
		$sheet->setCellValue('P1', 'CELULAR');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, $val['FOTO']);
			$sheet->setCellValue('C' . $rows, $val['FI']);
			$sheet->setCellValue('D' . $rows, $val['NOMBRE']);
			$sheet->setCellValue('E' . $rows, $val['TIPO']);
			$sheet->setCellValue('F' . $rows, $val['CLASE']);
			$sheet->setCellValue('G' . $rows, $val['PUESTO']);
			$sheet->setCellValue('H' . $rows, $val['CALLE']);
			$sheet->setCellValue('I' . $rows, $val['NOEXT']);
			$sheet->setCellValue('J' . $rows, $val['NOINT']);
			$sheet->setCellValue('K' . $rows, $val['COLONIA']);
			$sheet->setCellValue('L' . $rows, $val['CP']);
			$sheet->setCellValue('M' . $rows, $val['MUNICIPIO']);
			$sheet->setCellValue('N' . $rows, $val['ESTADO']);
			$sheet->setCellValue('O' . $rows, $val['TELEFONO']);
			$sheet->setCellValue('P' . $rows, $val['CELULAR']);
			$rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'Empleados.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	
        
	}

	public function exportar_usuarios() {

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_usuarios();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
		$sheet->setCellValue('B1', 'NOMBRE');
		$sheet->setCellValue('C1', 'EMAIL/USUARIO');
		$sheet->setCellValue('D1', 'CONTRASEÑA');
		$sheet->setCellValue('E1', 'AREA');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, $val['NOMBRE']);
			$sheet->setCellValue('C' . $rows, $val['EMAIL']);
			$sheet->setCellValue('D' . $rows, $val['PASWORD']);
			$sheet->setCellValue('E' . $rows, $val['AREA']);
			$rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'Usuarios.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	
        
	}

	public function exportar_flujos() {

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_flujos();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
		$sheet->setCellValue('B1', 'FECHA');
		$sheet->setCellValue('C1', 'TIPO');
		$sheet->setCellValue('D1', 'METODO');
		$sheet->setCellValue('E1', 'EMPLEADO');
		$sheet->setCellValue('F1', 'AREA');
		$sheet->setCellValue('G1', 'CONCEPTO');
		$sheet->setCellValue('H1', 'CANTIDAD');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, date('d-m-Y',strtotime($val['FECHA'])));
			$sheet->setCellValue('C' . $rows, $val['TIPO']);
			$sheet->setCellValue('D' . $rows, $val['METODO']);
			$sheet->setCellValue('E' . $rows, $val['EMPLEADO']);
			$sheet->setCellValue('F' . $rows, $val['AREA']);
			$sheet->setCellValue('G' . $rows, $val['CONCEPTO']);
			$sheet->setCellValue('H' . $rows, $val['CANTIDAD']);
			$rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'Flujos.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	
        
	}

	public function exportar_requisiciones() {

		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();
		$datos = $this->FunctionsModel->get_requisiciones();

        // manually set table data value
        $sheet->setCellValue('A1', 'ID'); 
		$sheet->setCellValue('B1', 'FECHA');
		$sheet->setCellValue('C1', 'UNIDAD');
		$sheet->setCellValue('D1', 'SOLICITANTE');
		$sheet->setCellValue('E1', 'CANTIDAD');
		$sheet->setCellValue('F1', 'UNIDAD DE MEDIDA');
		$sheet->setCellValue('G1', 'DESCRIPCION');
		$sheet->setCellValue('H1', 'AREA');
		$sheet->setCellValue('I1', 'ESTATUS');
		$sheet->setCellValue('J1', 'ORDEN');
		$rows = 2;
		
		foreach ($datos as $val){
            $sheet->setCellValue('A' . $rows, $val['ID']);
            $sheet->setCellValue('B' . $rows, date('d-m-Y',strtotime($val['FECHA'])));
			$sheet->setCellValue('C' . $rows, $val['UNIDAD']);
			$sheet->setCellValue('D' . $rows, $val['SOLICITANTE']);
			$sheet->setCellValue('E' . $rows, $val['CANTIDAD']);
			$sheet->setCellValue('F' . $rows, $val['UMED']);
			$sheet->setCellValue('G' . $rows, $val['DESCRIPCION']);
			$sheet->setCellValue('H' . $rows, $val['AREA']);
			$sheet->setCellValue('I' . $rows, $val['ESTATUS']);
			$sheet->setCellValue('J' . $rows, $val['ORDEN']);
			$rows++;
        } 

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'Requisiciones.xlsx'; // set filename for excel file to be exported
			// download file
		
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	
        
	}
	

#EXPORTAR A EXCEL

#CATALOGO

	//BANCOS
	public function bancos(){
		$datos['tb_bancos'] = $this->FunctionsModel->get_bancos();
		$this->load->view('contabilidad/catalogos/bancos',$datos);
	}

	public function insert_bancos(){
			$banco = $this->input->post('txt_banco');
			if(!empty(isset($banco))){
				$datos = array(
					'banco' => $banco
				);
				$resultado = $this->FunctionsModel->insert_banco($datos);
			}
	}

	public function update_bancos(){
		$banco = $this->input->post('txt_banco');
		$id = $this->input->post('id');
		if(!empty(isset($banco))&&!empty(isset($id))){
			$resultado = $this->FunctionsModel->update_banco($banco,$id);
		}else{
			return false;
		}
}

	public function delete_bancos(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_bancos($id);
		}else{
			return false;
		}

	}

	//CUENTAS
	public function cuentas(){
		$datos['tb_bancos'] = $this->FunctionsModel->get_bancos();
		$datos['tb_cuentas'] = $this->FunctionsModel->get_cuentas();
		$this->load->view('contabilidad/catalogos/cuentas',$datos);
	}

	public function insert_cuenta(){
		$banco = $this->input->post('banco');
		$cuenta = $this->input->post('cuenta');
		if(!empty(isset($banco))&&!empty(isset($cuenta))){
			$datos = array(
				'banco' => $banco,
				'cuenta' => $cuenta
			);

			$resultado = $this->FunctionsModel->insert_cuenta($datos);

			if($resultado){
				return true;
			}else{
				return false;}
		}
	}

	public function delete_cuenta(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_cuentas($id);
			if($resultado){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}

	//PROVEEDORES
	public function proveedores(){
		$datos['tb'] = $this->FunctionsModel->get_proveedores();
		$this->load->view('contabilidad/catalogos/proveedores',$datos);
	}

	public function proveedor(){
		$id = $this->input->post('id');
		$datos = $this->FunctionsModel->proveedor($id);
		if($datos){
			// $proveedor = array($datos);
			echo json_encode($datos);
			// return $datos;
		}else{
			return false;
		}	
	}

	public function insert_proveedor(){
		$nombre = $this->input->post('nombre');
		$razonsocial = $this->input->post('razonsocial');
		$rfc = $this->input->post('rfc');
		$calle = $this->input->post('calle');
		$noext = $this->input->post('noext');
		$noint = $this->input->post('noint');
		$colonia = $this->input->post('colonia');
		$cp = $this->input->post('cp');
		$municipio = $this->input->post('municipio');
		$estado = $this->input->post('estado');

		if(!empty(isset($nombre))&&!empty(isset($razonsocial))&&!empty(isset($rfc))
		&&!empty(isset($calle))&&!empty(isset($noext))&&!empty(isset($noint))
		&&!empty(isset($colonia))&&!empty(isset($cp))&&!empty(isset($municipio))
		&&!empty(isset($estado))){

			$datos = array(
				'NOMBRE' => $nombre,
				'RAZONSOCIAL' => $razonsocial,
				'RFC' => $rfc,
				'CALLE' => $calle,
				'NOEXT' => $noext,
				'NOINT' => $noint,
				'COLONIA' => $colonia,
				'CP' => $cp,
				'MUNICIPIO' => $municipio,
				'ESTADO' => $estado
			);

			$resultado = $this->FunctionsModel->insert_proveedor($datos);

			if($resultado){
				return true;
			}else{
				return false;}
		}else{
			return false;
		}
	}

	public function update_proveedor(){

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$razonsocial = $this->input->post('razonsocial');
		$rfc = $this->input->post('rfc');
		$calle = $this->input->post('calle');
		$noext = $this->input->post('noext');
		$noint = $this->input->post('noint');
		$colonia = $this->input->post('colonia');
		$cp = $this->input->post('cp');
		$municipio = $this->input->post('municipio');
		$estado = $this->input->post('estado');
		
		if(!empty(isset($id))&&!empty(isset($nombre))&&!empty(isset($razonsocial))
		&&!empty(isset($rfc))&&!empty(isset($calle))&&!empty(isset($noext))&&!empty(isset($noint))
		&&!empty(isset($colonia))&&!empty(isset($cp))&&!empty(isset($municipio))&&!empty(isset($estado))){
			
			$datos=array(
				'nombre'=> $nombre,
				'razonsocial'=> $razonsocial,
				'rfc'=> $rfc,
				'calle'=> $calle,
				'noext'=> $noext,
				'noint'=> $noint,
				'colonia'=> $colonia,
				'cp'=> $cp,
				'municipio'=> $municipio,
				'estado'=> $estado
			);

			$result = $this->FunctionsModel->update_proveedor($datos,$id);
			if($result){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	
	
	}

	public function delete_proveedor(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_proveedor($id);
		}else{
			return false;
		}

	}

	//UNIDADES
	public function unidades(){
		$id = $this->input->post('id_user');
		$datos['tb'] = $this->FunctionsModel->get_unidades();
		$datos['user'] = $this->FunctionsModel->usuario($id);
		$this->load->view('logistica/catalogos/unidades',$datos);
	}

	public function unidad(){
		$id = $this->input->post('id');
		$datos = $this->FunctionsModel->unidad($id);
		if($datos){
			// $proveedor = array($datos);
			echo json_encode($datos);
			// return $datos;
		}else{
			return false;
		}	
	}

	public function insert_unidad(){

		$economico = strtoupper($this->input->post('economico'));
		$modelo = strtoupper($this->input->post('modelo'));
		$year = strtoupper($this->input->post('year'));
		$tipo = strtoupper($this->input->post('tipo'));
		$serie = strtoupper($this->input->post('serie'));
		$placa = strtoupper($this->input->post('placa'));
		$pf = strtoupper($this->input->post('pf'));
		$combustible = strtoupper($this->input->post('combustible'));
		$ctanque = strtoupper($this->input->post('ctanque'));
		$re = strtoupper($this->input->post('re'));
		$gps = strtoupper($this->input->post('gps'));
		$estatus = strtoupper($this->input->post('estatus'));
		$fecha = strtoupper($this->input->post('fecha'));

		// $data = array();

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']        = '15000';
		$config['overwrite']        = TRUE;
		$config['remove_space']     = TRUE;

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('tc') || $this->upload->do_upload('factura') 
		|| $this->upload->do_upload('ps')){

			$tc = $_FILES['tc']['name'];
			$factura = $_FILES['factura']['name'];
			$ps = $_FILES['ps']['name'];

			$n1 = str_replace(' ', '_', $tc);
			$n2 = str_replace(' ', '_', $factura);
			$n3 = str_replace(' ', '_', $ps);

				$datos = array(
				'economico' => $economico,
				'modelo' => $modelo,
				'year' => $year,
				'tipo' => $tipo,
				'serie' => $serie,
				'placa' => $placa,
				'pf' => $pf,
				'tc' => $n1,
				'factura' => $n2,
				'ps' => $n3,
				'combustible' => $combustible,
				'ctanque' => $ctanque,
				're' => $re,
				'gps' => $gps,
				'estatus' => $estatus,
				'fecha' => $fecha
				);  

				$result= $this->FunctionsModel->insert_unidad($datos);

				if($result){
					return true;
				}else{
					return false;
				}
			
			}else{
				$img_default = "default.jpg";
				$datos = array(
					'economico' => $economico,
					'modelo' => $modelo,
					'year' => $year,
					'tipo' => $tipo,
					'serie' => $serie,
					'placa' => $placa,
					'pf' => $pf,
					'tc' => $img_default,
					'factura' => $img_default,
					'ps' => $img_default,
					'combustible' => $combustible,
					'ctanque' => $ctanque,
					're' => $re,
					'gps' => $gps,
					'estatus' => $estatus,
					'fecha' => $fecha
					);

					$result= $this->FunctionsModel->insert_unidad($datos);
					if($result){
						return true;
					}else{
						return false;
					}
				}
}

	public function update_unidad(){

		$id = $this->input->post('id');
		$economico = strtoupper($this->input->post('economico'));
		$modelo = strtoupper($this->input->post('modelo'));
		$year = strtoupper($this->input->post('year'));
		$tipo = strtoupper($this->input->post('tipo'));
		$serie = strtoupper($this->input->post('serie'));
		$placa = strtoupper($this->input->post('placa'));
		$pf = strtoupper($this->input->post('pf'));
		$combustible = strtoupper($this->input->post('combustible'));
		$ctanque = strtoupper($this->input->post('ctanque'));
		$re = strtoupper($this->input->post('re'));
		$gps = strtoupper($this->input->post('gps'));
		$estatus = strtoupper($this->input->post('estatus'));
		$fecha = strtoupper($this->input->post('fecha'));

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']        = '15000';
		$config['overwrite']        = TRUE;
		$config['remove_spaces']     = TRUE;
	
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('tc') || $this->upload->do_upload('factura') 
		|| $this->upload->do_upload('ps')){

		
		$tc = $_FILES['tc']['name'];
		$factura = $_FILES['factura']['name'];
		$ps = $_FILES['ps']['name'];

		$n1 = str_replace(' ', '_', $tc);
		$n2 = str_replace(' ', '_', $factura);
		$n3 = str_replace(' ', '_', $ps);

			$datos = array(
			'economico' => $economico,
			'modelo' => $modelo,
			'year' => $year,
			'tipo' => $tipo,
			'serie' => $serie,
			'placa' => $placa,
			'pf' => $pf,
			'tc' => $n1,
			'factura' => $n2,
			'ps' => $n3,
			'combustible' => $combustible,
			'ctanque' => $ctanque,
			're' => $re,
			'gps' => $gps,
			'estatus' => $estatus,
			'fecha' => $fecha
			);  

			$result= $this->FunctionsModel->update_unidad($datos,$id);

			if($result){
				return true;
			}else{
				return false;
			}
			
			}else{
				$img_default = "default.jpg";
				$datos = array(
					'economico' => $economico,
					'modelo' => $modelo,
					'year' => $year,
					'tipo' => $tipo,
					'serie' => $serie,
					'placa' => $placa,
					'pf' => $pf,
					'tc' => $img_default,
					'factura' => $img_default,
					'ps' => $img_default,
					'combustible' => $combustible,
					'ctanque' => $ctanque,
					're' => $re,
					'gps' => $gps,
					'estatus' => $estatus,
					'fecha' => $fecha
					);

					$result= $this->FunctionsModel->update_unidad($datos,$id);
					if($result){
						return true;
					}else{
						return false;
					}

			}
	}

	public function delete_unidad(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_unidad($id);
		}else{
			return false;
		}

	}

	//EMPLEADOS
	public function empleados(){
		$datos['tab'] = $this->FunctionsModel->get_empleados();
		$this->load->view('rh/catalogos/empleados',$datos);
	}

	public function empleado(){
		$id = $this->input->post('id');
		$datos = $this->FunctionsModel->empleado($id);
		if($datos){
			// $proveedor = array($datos);
			echo json_encode($datos);
			// return $datos;
		}else{
			return false;
		}	
	}

	public function insert_empleado(){
		
		$fi = $this->input->post('fi');
		$nombre = strtoupper($this->input->post('nombre'));
		$tipo = strtoupper($this->input->post('tipo'));
		$clase = strtoupper($this->input->post('clase'));
		$puesto = strtoupper($this->input->post('puesto'));
		$calle = strtoupper($this->input->post('calle'));
		$noext = $this->input->post('noext');
		$noint = $this->input->post('noint');
		$colonia = strtoupper($this->input->post('colonia'));
		$cp = $this->input->post('cp');
		$municipio = strtoupper($this->input->post('municipio'));
		$estado = strtoupper($this->input->post('estado'));
		$telefono = $this->input->post('telefono');
		$celular = $this->input->post('celular');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']        = '15000';
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('foto')){

			$datos = array(
			'foto' => $this->upload->data('file_name'),
			'fi' => $fi,	
			'nombre' => $nombre,
			'tipo' => $tipo,
			'clase' => $clase,
			'puesto' => $puesto,
			'calle' => $calle,
			'noext' => $noext,
			'noint' => $noint,
			'colonia' => $colonia,
			'cp' => $cp,
			'municipio' => $municipio,
			'estado' => $estado,
			'telefono' => $telefono,
			'celular' => $celular		
			);  

			$result= $this->FunctionsModel->insert_empleado($datos);

			if($result){
				return true;
			}else{
				return false;
			}
			
			}
	}

	public function update_empleado(){
		
		$id = $this->input->post('id');
		$fi = $this->input->post('fi');
		$nombre = strtoupper($this->input->post('nombre'));
		$tipo = strtoupper($this->input->post('tipo'));
		$clase = strtoupper($this->input->post('clase'));
		$puesto = strtoupper($this->input->post('puesto'));
		$calle = strtoupper($this->input->post('calle'));
		$noext = $this->input->post('noext');
		$noint = $this->input->post('noint');
		$colonia = strtoupper($this->input->post('colonia'));
		$cp = $this->input->post('cp');
		$municipio = strtoupper($this->input->post('municipio'));
		$estado = strtoupper($this->input->post('estado'));
		$telefono = $this->input->post('telefono');
		$celular = $this->input->post('celular');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']        = '15000';
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('foto')){

			$datos = array(
			'foto' => $this->upload->data('file_name'),
			'fi' => $fi,	
			'nombre' => $nombre,
			'tipo' => $tipo,
			'clase' => $clase,
			'puesto' => $puesto,
			'calle' => $calle,
			'noext' => $noext,
			'noint' => $noint,
			'colonia' => $colonia,
			'cp' => $cp,
			'municipio' => $municipio,
			'estado' => $estado,
			'telefono' => $telefono,
			'celular' => $celular		
			);  

			$result= $this->FunctionsModel->update_empleado($datos,$id);

			if($result){
				return true;
			}else{
				return false;
			}
			
			}
	
	}

	public function delete_empleado(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_empleado($id);
		}else{
			return false;
		}

	}

	//USUARIOS//
	public function usuarios(){
		$datos['tb'] = $this->FunctionsModel->get_usuarios();
		$this->load->view('sistemas/catalogos/usuarios',$datos);
	}

	public function usuario(){
		$id = $this->input->post('id');
		$datos = $this->FunctionsModel->usuario($id);
		if($datos){
			// $proveedor = array($datos);
			echo json_encode($datos);
			// return $datos;
		}else{
			return false;
		}	
	}

	public function insert_usuario(){

		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$area = $this->input->post('area');
		

		if(!empty(isset($nombre))&&!empty(isset($email))&&!empty(isset($password))
		&&!empty(isset($area))){

			$datos = array(
				'nombre' => $nombre,
				'email' => $email,
				'pasword' => $password,
				'area' => $area
			);

			$resultado = $this->FunctionsModel->insert_usuario($datos);

			if($resultado){
				return true;
			}else{
				return false;}
		}else{
			return false;
		}
	}

	public function update_usuario(){

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$area = $this->input->post('area');
		
		if(!empty(isset($id))&&!empty(isset($nombre))&&!empty(isset($email))
		&&!empty(isset($password))&&!empty(isset($area))){
			
			$datos=array(
				'nombre' => $nombre,
				'email' => $email,
				'pasword' => $password,
				'area' => $area
			);

			$result = $this->FunctionsModel->update_usuario($datos,$id);
			if($result){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	
	
	}
	
	public function delete_usuario(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_usuario($id);
		}else{
			return false;
		}

	}
#CATALOGO

#CONTABILIDAD
	#FLUJOS
	public function flujos(){
		$id = $this->input->post('id_user');
		$datos['tb'] = $this->FunctionsModel->get_flujos();
		$datos['empleados'] = $this->FunctionsModel->get_empleados();
		$datos['user'] = $this->FunctionsModel->usuario($id);
		$this->load->view('contabilidad/flujos',$datos);
	}

	public function flujo(){
		$id = $this->input->post('id');
		$datos = $this->FunctionsModel->flujo($id);
		if($datos){
			// $proveedor = array($datos);
			echo json_encode($datos);
			// return $datos;
		}else{
			return false;
		}	
	}

	public function insert_flujo(){
		
		$fecha = $this->input->post('fecha');
		$tipo = strtoupper($this->input->post('tipo'));
		$metodo = strtoupper($this->input->post('metodo'));
		$empleado = strtoupper($this->input->post('empleado'));
		$area = strtoupper($this->input->post('area'));
		$concepto = strtoupper($this->input->post('concepto'));
		$cantidad = $this->input->post('cantidad');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']        = '15000';
		$config['overwrite']        = TRUE;
		$config['remove_spaces']     = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$comprobante = $_FILES['comprobante']['name'];
		$n1 = str_replace(' ', '_', $comprobante);


		if($this->upload->do_upload('comprobante')){

			$datos = array(
			
			'fecha' => $fecha,	
			'tipo' => $tipo,
			'metodo' => $metodo,
			'empleado' => $empleado,
			'area' => $area,
			'concepto' => $concepto,
			'cantidad' => $cantidad,
			'comprobante' => $n1
			);  

			$result= $this->FunctionsModel->insert_flujo($datos);

			if($result){
				return true;
			}else{
				return false;
			}
			
		}else{
			$img_default = "default.jpg";
				$datos = array(
					'fecha' => $fecha,	
					'tipo' => $tipo,
					'metodo' => $metodo,
					'empleado' => $empleado,
					'area' => $area,
					'concepto' => $concepto,
					'cantidad' => $cantidad,
					'comprobante' => $img_default
					);

					$result= $this->FunctionsModel->insert_flujo($datos);
					if($result){
						return true;
					}else{
						return false;
					}
		}
	}

	public function update_flujo(){
		
		$id = $this->input->post('id');
		$fecha = $this->input->post('fecha');
		$tipo = strtoupper($this->input->post('tipo'));
		$metodo = strtoupper($this->input->post('metodo'));
		$empleado = strtoupper($this->input->post('empleado'));
		$area = strtoupper($this->input->post('area'));
		$concepto = strtoupper($this->input->post('concepto'));
		$cantidad = $this->input->post('cantidad');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']        = '15000';
		$config['overwrite']        = TRUE;
		$config['remove_spaces']     = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$comprobante = $_FILES['comprobante']['name'];
		$n1 = str_replace(' ', '_', $comprobante);

		if($this->upload->do_upload('comprobante')){
			$datos = array(
				'fecha' => $fecha,	
				'tipo' => $tipo,
				'metodo' => $metodo,
				'empleado' => $empleado,
				'area' => $area,
				'concepto' => $concepto,
				'cantidad' => $cantidad,
				'comprobante' => $n1
				);    

			$result= $this->FunctionsModel->update_flujo($datos,$id);

			if($result){
				return true;
			}else{
				return false;
			}
			
		}else{
			$img_default = "default.jpg";
				$datos = array(
					'fecha' => $fecha,	
					'tipo' => $tipo,
					'metodo' => $metodo,
					'empleado' => $empleado,
					'area' => $area,
					'concepto' => $concepto,
					'cantidad' => $cantidad,
					'comprobante' => $img_default
					);

					$result= $this->FunctionsModel->update_flujo($datos,$id);
					if($result){
						return true;
					}else{
						return false;
					}
		}
	
	}

	public function delete_flujo(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_flujo($id);
		}else{
			return false;
		}

	}

	public function saldo_actual(){
		$sum_ing = $this->FunctionsModel->get_ingresos();
		$sum_egr = $this->FunctionsModel->get_egresos();
		$saldo_actual = ($sum_ing - $sum_egr);
		echo json_encode($saldo_actual);
		
	}


	#FLUJOS
#CONTABILIDAD

#ALMACEN

	#REQUISICIONES#
		public function requisiciones(){
			$id = $this->input->post('id_user');
			$datos['tb'] = $this->FunctionsModel->get_requisiciones();
			$datos['user'] = $this->FunctionsModel->usuario($id);
			$datos['unidades'] = $this->FunctionsModel->get_unidades();
			$datos['empleados'] = $this->FunctionsModel->get_empleados();
			$this->load->view('almacen/requisiciones',$datos);
		}

		public function requisicion(){
			$id = $this->input->post('id');
			$datos = $this->FunctionsModel->requisicion($id);
			if($datos){
				// $proveedor = array($datos);
				echo json_encode($datos);
				// return $datos;
			}else{
				return false;
			}	
		}

		public function insert_requisicion(){
		
			$fecha = $this->input->post('fecha');
			$unidad = strtoupper($this->input->post('unidad'));
			$solicitante = strtoupper($this->input->post('solicitante'));
			$cantidad = strtoupper($this->input->post('cantidad'));
			$umed = strtoupper($this->input->post('umed'));
			$descripcion = strtoupper($this->input->post('descripcion'));
			$area = strtoupper($this->input->post('area'));
			$estatus = strtoupper($this->input->post('estatus'));

			$datos = array(
				'fecha'=>$fecha,
				'unidad'=>$unidad,
				'solicitante'=>$solicitante,
				'cantidad'=>$cantidad,
				'umed'=>$umed,
				'descripcion'=>$descripcion,
				'area'=>$area,
				'estatus'=>$estatus
			);

			$result= $this->FunctionsModel->insert_requisicion($datos);
			if($result){
				return true;
			}else{
				return false;
			}
		}



		public function update_requisicion(){
		
			$id = $this->input->post('id');
			$fecha = $this->input->post('fecha');
			$unidad = strtoupper($this->input->post('unidad'));
			$solicitante = strtoupper($this->input->post('solicitante'));
			$cantidad = strtoupper($this->input->post('cantidad'));
			$umed = strtoupper($this->input->post('umed'));
			$descripcion = strtoupper($this->input->post('descripcion'));
			$area = strtoupper($this->input->post('area'));
			$estatus = strtoupper($this->input->post('estatus'));

			$datos = array(
				'fecha' => $fecha,
				'unidad' => $unidad,
				'solicitante' => $solicitante,
				'cantidad' => $cantidad,
				'umed' => $umed,
				'descripcion' => $descripcion,
				'area' => $area,
				'estatus' => $estatus

			);

			$result = $this->FunctionsModel->update_requisicion($datos,$id);

			if($result){
				return true;
			}else{
				return false;
			}
		
		}

		public function delete_requisicion(){
			$id = $this->input->post('id');
			if(!empty(isset($id))){
				$resultado = $this->FunctionsModel->delete_requisicion($id);
			}else{
				return false;
			}
	
		}

		public function create_orden(){

			date_default_timezone_set('America/Monterrey');
            $hoy = date("d-m-Y");	

				$datos = array(
					'fecha'=> $hoy,
					'proveedor'=>"",
					'subtotal'=>0,
					'iva'=>0,
					'total'=>0,
					'comprobante'=>""
				);

				$result = $this->FunctionsModel->insert_orden($datos);

				if($result){
					return true;
				}else{
					return false;
				}

		}

		public function to_orden(){

					$req_id = $this->input->post('req_id');
					$orden_id = $this->FunctionsModel->get_last_id_orden();
					$result = $this->FunctionsModel->to_orden($req_id,$orden_id);

					if($result){
						return true;
					}else{
						return false;
					}
		}

	#REQUISICIONES#

	#ORDENES#
	public function ordenes(){
		$id = $this->input->post('id_user');
		$datos['tb'] = $this->FunctionsModel->get_ordenes();
		$datos['user'] = $this->FunctionsModel->usuario($id);
		$this->load->view('almacen/ordenes',$datos);
	}

	public function orden(){
		$id = $this->input->post('id');
		$datos = $this->FunctionsModel->orden($id);
		if($datos){
			// $proveedor = array($datos);
			echo json_encode($datos);
			// return $datos;
		}else{
			return false;
		}	
	}

	public function update_orden(){
		
		$id = $this->input->post('id');
		$fecha = $this->input->post('fecha');
		$proveedor = strtoupper($this->input->post('proveedor'));
		$subtotal = $this->input->post('subtotal');
		$iva = $this->input->post('iva');
		$total = $this->input->post('total');
		

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']        = '15000';
		$config['overwrite']        = TRUE;
		$config['remove_spaces']     = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$comprobante = $_FILES['comprobante']['name'];
		$n1 = str_replace(' ', '_', $comprobante);

		if($this->upload->do_upload('comprobante')){
			$datos = array(
				'fecha' => $fecha,	
				'proveedor' => $proveedor,
				'subtotal' => $subtotal,
				'iva' => $iva,
				'total' => $total,
				'comprobante' => $n1
				);    

			$result= $this->FunctionsModel->update_orden($datos,$id);

			if($result){
				return true;
			}else{
				return false;
			}
			
		}else{
			$img_default = "default.jpg";
				$datos = array(
					'fecha' => $fecha,	
					'proveedor' => $proveedor,
					'subtotal' => $subtotal,
					'iva' => $iva,
					'total' => $total,
					'comprobante' => $img_default
					);

					$result= $this->FunctionsModel->update_orden($datos,$id);
					if($result){
						return true;
					}else{
						return false;
					}
		}
	
	}

	public function delete_orden(){
		$id = $this->input->post('id');
		if(!empty(isset($id))){
			$resultado = $this->FunctionsModel->delete_orden($id);
		}else{
			return false;
		}

	}
	#ORDENES#

#ALMACEN


#LOGIN
	public function salir(){
		$this->session->sess_destroy();
        redirect('welcome/index');
	}
#LOGIN

	}



?>