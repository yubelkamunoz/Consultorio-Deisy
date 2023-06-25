<?php
include("../model/empleados.php");
include("../src/fpdf184/code128.php");
include("../src/fpdf184/cellfit.php");
$conexion = require("../model/conexion.php");

$objEmpleados = new empleados($conexion);
$empleados = $objEmpleados->get();

$objCell = new FPDF_CellFit();
$objPdf = new PDF_Code128('P','mm','Letter');
$objPdf->SetMargins(17,17,17);
$objPdf->AddPage();

# Logo de la empresa formato png #
$objPdf->Image('../src/fpdf184/img/logo.png',165,12,35,35,'PNG');

# Encabezado y datos de la empresa #
$objPdf->SetFont('Arial','B',16);
$objPdf->SetTextColor(75,73,172);
$objPdf->Cell(150,10,utf8_decode(strtoupper("Consultorio Deysy Jara")),0,0,'L');
$objPdf->Ln();

$objPdf->SetFont('Arial','',10);
$objPdf->SetTextColor(39,39,51);
$objPdf->Cell(150,9,utf8_decode("RUC: 0000000000"),0,0,'L');

$objPdf->Ln(5);
$objPdf->Cell(150,9,utf8_decode("Direccion San Cristóbal, Táchira Venezuela"),0,0,'L');
$objPdf->Ln(5);
$objPdf->Cell(150,9,utf8_decode("Teléfono: 0276-3699964"),0,0,'L');
$objPdf->Ln(5);
$objPdf->Cell(150,9,utf8_decode("Email: correo@ejemplo.com"),0,0,'L');

$objPdf->Ln(16);

$objPdf->SetFont('Arial','b',12);
$objPdf->SetTextColor(75,73,172);
$objPdf->Cell(150,9,utf8_decode("REPORTE DE EMPLEADOS"),0,0,'L');


$objPdf->Ln(20);

	# Tabla de productos #
	$objPdf->SetFont('Arial','',8);
	$objPdf->SetFillColor(75,73,172);
	$objPdf->SetDrawColor(75,73,172);
	$objPdf->SetTextColor(255,255,255);
	$objPdf->Cell(5,8,utf8_decode("Id"),1,0,'C',true);
	$objPdf->Cell(20,8,utf8_decode("Nombre"),1,0,'C',true);
	$objPdf->Cell(20,8,utf8_decode("Apellido"),1,0,'C',true);
	$objPdf->Cell(20,8,utf8_decode("Nac."),1,0,'C',true);
	$objPdf->Cell(15,8,utf8_decode("Doc"),1,0,'C',true);
	$objPdf->Cell(12,8,utf8_decode("Cargo"),1,0,'C',true);
	$objPdf->Cell(20,8,utf8_decode("Fecha"),1,0,'C',true);
	$objPdf->Cell(15,8,utf8_decode("Sexo"),1,0,'C',true);
	$objPdf->Cell(20,8,utf8_decode("Direccion"),1,0,'C',true);
	$objPdf->Cell(20,8,utf8_decode("Telefono"),1,0,'C',true);
	$objPdf->Cell(20,8,utf8_decode("Rif"),1,0,'C',true);

	$objPdf->Ln(8);	
	$objPdf->SetTextColor(39,39,51);

	/*----------  Detalles de la tabla  ----------*/
	while($fila = $empleados->fetch_assoc()) {
	$objPdf->Cell(5, 7, utf8_decode($fila['id_empleado']),'L',0,'C');
	$objPdf->Cell(20, 7,utf8_decode($fila['nombre']),'L',0,'C');
	/*Funcion de la clase FPDF Cellfit para truncar*/
/* 	$objCell->CellFitScale(20, 7,utf8_decode($fila['apellido']),'L',0,'C'); */
 	$objPdf->Cell(20, 7,utf8_decode($fila['apellido']),'L',0,'C');
 	$objPdf->Cell(20, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Cell(15, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Cell(12, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Cell(20, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Cell(15, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Cell(20, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Cell(20, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Cell(20, 7, utf8_decode($fila['apellido']),'L',0,'C');
	$objPdf->Ln(7);
} 
	/*----------  Fin Detalles de la tabla  ----------*/





/* $objPdf->setFont('Arial', '', 7);

 while($fila = $empleados->fetch_assoc()) {
	$objPdf->Cell(10, 6, $fila['id_empleado'], 1, 0, 'C');
	$objPdf->Cell(20, 6, utf8_decode($fila['nombre']), 1, 0, 'C');
	$objPdf->Cell(20, 6, utf8_decode($fila['apellido']), 1, 0, 'C');
	$objPdf->Cell(20, 6, utf8_decode($fila['nacionalidad']), 1, 1, 'C');
	$objPdf->Cell(20, 6, utf8_decode($fila['nacionalidad']), 1, 1, 'C');

}  */


/* $objPdf->setFillColor(232, 232, 232);
$objPdf->setFont('helvetica', 'B', 12);
$objPdf->Cell(10, 6, 'Codigo', 1, 0, 'C', 1);
$objPdf->Cell(10, 6, 'Nombre', 1, 0, 'C', 1);
$objPdf->Cell(10, 6, 'Apellido', 1, 0, 'C', 1);
$objPdf->Cell(10, 6, 'Nacionalidad', 1, 1, 'C', 1);
$objPdf->Cell(10, 6, 'Doc', 1, 1, 'C', 1);
$objPdf->Cell(10, 6, 'Cargo', 1, 1, 'C', 1);
$objPdf->Cell(10, 6, 'Fecha', 1, 1, 'C', 1);
$objPdf->Cell(10, 6, 'Sexo', 1, 1, 'C', 1);
$objPdf->Cell(10, 6, 'Direccion', 1, 1, 'C', 1);
$objPdf->Cell(10, 6, 'Telefono', 1, 1, 'C', 1);
$objPdf->Cell(10, 6, 'Rif', 1, 1, 'C', 1);

$objPdf->setFont('Arial', '', 10);

 while($fila = $empleados->fetch_assoc()) {
	$objPdf->Cell(10, 6, $fila['id_empleado'], 1, 0, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['nombre']), 1, 0, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['apellido']), 1, 0, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['nacionalidad']), 1, 0, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['documento_identidad']), 1, 1, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['cargo']), 1, 1, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['fecha_nacimiento']), 1, 1, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['sexo']), 1, 1, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['direccion']), 1, 1, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['telefono']), 1, 1, 'C');
	$objPdf->Cell(10, 6, utf8_decode($fila['rif']), 1, 1, 'C');
}  */


$objPdf->Output();
