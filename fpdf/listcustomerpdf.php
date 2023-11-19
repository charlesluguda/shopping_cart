<?php 
session_start();
require_once('..//connection.php');
$sql = "SELECT * FROM `users` WHERE Admin = 'user'";
$query = mysqli_query($conn, $sql);

require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','U',14);
$pdf->Cell(65);
$pdf->Cell(40,14, "CUSTOMER LIST",0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,8,'Sno',1,0);
$pdf->Cell(40,8,'Fullname',1,0);
$pdf->Cell(55,8,'Email',1,0);
$pdf->Cell(40,8,'Address',1,0);
$pdf->Cell(40,8,'Phone number',1,0);
$sn = 1;

while($row = mysqli_fetch_array($query)){
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(15,8,$sn, 1,0);
    $pdf->Cell(40,8,$row['Fullname'], 1,0);
    $pdf->Cell(55,8,$row['Email'], 1,0);
    $pdf->Cell(40,8,$row['Address'], 1,0);
    $pdf->Cell(40,8,$row['Phone number'], 1,0);
    $sn++;

}
$pdf->Output();
?>