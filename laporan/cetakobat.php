<?php
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('../img/rolas-medika-nu.png',10,10,25,25);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'RUMAH SAKIT UMUM KALIWATES JEMBER',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Jl. Diah Pitaloka No.4A, Kaliwates Kidul, Kaliwates, Jember',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Telp : (0331) 483505, (0331) 483309',0,1,'C');
$pdf->Ln(3);
$pdf->cell(190, 0.6, '', '0', '1', 'C', true);
$pdf->Ln(3);
//$pdf->Ln(100);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(47.5,8,'ID OBAT',1,0,'C');
$pdf->Cell(47.5,8,'NO. RESEP',1,0,'C');
$pdf->Cell(47.5,8,'JUMLAH',1,0,'C');
$pdf->Cell(47.5,8,'STATUS',1,1,'C');

$pdf->SetFont('Arial','',10);

include '../konek.php';
$mahasiswa = mysqli_query($link, "select * from status_obat");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(47.5,8,$row['id_obat'],1,0,'C');
    $pdf->Cell(47.5,8,$row['no_resep'],1,0,'C');
    $pdf->Cell(47.5,8,$row['jml_obat'],1,0,'C');
    $pdf->Cell(47.5,8,$row['status'],1,1,'C'); 
}

$pdf->Output();
?>
