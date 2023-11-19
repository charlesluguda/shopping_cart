<?php
require_once('..//connection.php');
require('fpdf.php');

class myPDF extends FPDF {
    // Page header
    function Header() {
        // Set font family to Arial bold 
        $this->SetFont('Times','B',14);

        // Move to the right
        $this->Cell(276,5, '');

        // Sets the text color
        $this->SetTextColor(0,0,255);

        // Line break
        $this->Ln(20);

        // Header
        $this->Cell(200,10,'LIST OF REGISTERED CUSTOMERS',0,0,'C');

        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-25);

        // Arial italic 8
        $this->SetFont('Arial','I',8);

        // Page number
        $this->Cell(0,10,'Page ' . $this->PageNo() . '/{nb}',0,0,'C');
    }

    // Header attributes
    function headerAttributes() {
        $this->SetFont('Times','B',10);
        $this->Cell(30,10,'Fullname',1,0,'C');
        $this->Cell(45,10,'Email',1,0,'C');
        $this->Cell(60,10,'Address',1,0,'C');
        $this->Cell(40,10,'Phone number',1,0,'C');
        $this->Ln();
    }
}

// Instantiation of FPDF class
$pdf = new myPDF();
$pdf->AddPage();

// Header
$pdf->headerAttributes();

// Fetch customer data from the database
$sql = "SELECT * FROM `users`";
$query = mysqli_query($conn, $sql);

// Loop through the results and print each customer's information
while($row = mysqli_fetch_array($query)){
    $pdf->SetFont('Times','',10);
    $pdf->Cell(30,10,$row['Fullname'],1,0,'C');
    $pdf->Cell(45,10,$row['Email'],1,0,'C');
    $pdf->Cell(60,10,$row['Address'],1,0,'C');
    $pdf->Cell(40,10,$row['Phone number'],1,0,'C');
    $pdf->Ln();
}

// Define an alias for the total number of pages
$pdf->AliasNbPages();

// Output the PDF
$pdf->Output();
?>
