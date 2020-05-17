<?php
class ooo extends FPDF
{
	//Page header
	function Header()
	{
                $this->setFont('Times','I',10);
                $this->setFillColor(255,255,255);
    
                //$this->Image(base_url().'assets/images/disdik.jpg', 15, 10,'30','40','jpg');
                
                $this->Ln(10);
                $this->setFont('Times','',12);
                $this->setFillColor(255,255,255);
                $this->cell(55,6,'',0,0,'C',0); 

                $this->cell(80,6,'PEMERINTAH KABUPATEN KEPAHIANG ',0,1,'L',1); 
				$this->cell(48,6,'',0,0,'C',0); 
                $this->cell(60,6,'DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA ',0,1,'L',1); 
                $this->cell(50,6,'',0,0,'C',0); 
                $this->setFont('Times','',20);
                $this->cell(80,8,'SMK NEGERI 2 KEPAHIANG',0,1,'L',1); 
                $this->setFont('Times','',10);
                $this->cell(82,6,'',0,0,'C',0); 
                $this->cell(80,6,'Terakreditasi B ',0,1,'L',1); 
                $this->setFont('Times','I',8);
                $this->cell(68,6,'',0,0,'C',0); 
                $this->cell(100,3,'Alamat Jl. Desa Weskust, Kab. Kepahiang',0,1,'L',1); 
                $this->Ln(3);
                $this->Line(10,$this->GetY(),200,$this->GetY());
                $this->Ln(1);
                $this->Line(10,$this->GetY(),200,$this->GetY());
                $this->Ln(5);

                $this->setFont('Arial','B',12);
                $this->cell(35,6,'',0,0,'C',0); 
                $this->cell(115,6,' SURAT TEGURAN ',0,1,'C',1);
				$this->Ln(1);
				$this->Line(130,$this->GetY(),75,$this->GetY());
				$this->Ln(2);
				$this->setFont('Times','',11);
                $this->cell(70,6,'',0,0,'C',0); 
                $this->cell(80,6,'Nomor : .... /SP-KEU/...../..... ',0,1,'L',1); 

                $this->Ln(3);

               
	}
 
	function Content($bayar, $iuran, $nip, $nama, $siswa)
	{
		$total=0;

		$this->setFillColor(255,255,255);

		 		$this->setFont('Times','',11);
                $this->cell(8,6,'',0,0,'C',0); 
                $this->cell(100,6,'Surat ini ditujukan kepada: ',0,1,'L',1); 
				
				$this->Ln(1);

				foreach ($siswa->result() as $s) {
				
				$this->setFont('Times','',11);
                $this->cell(8,6,'',0,0,'C',0); 
                $this->cell(100,6,'NIS            : '.$s->nis,0,1,'L',1); 
				$this->cell(8,6,'',0,0,'C',0); 
				$this->cell(100,6,'Nama         : '.$s->nama_siswa,0,1,'L',1);
				$this->cell(8,6,'',0,0,'C',0); 
				$this->cell(100,6,'Kelas         : '.$s->nama_kelas,0,1,'L',1);

				}

                $this->Ln(5);

				$this->setFont('Times','b',11);
				$this->cell(8,6,'',0,0,'C',0); 
				$this->cell(100,6,'Assalamualaikum warahmatullahi wabarakatuh,',0,1,'L',1);
				$this->Ln(2);
				$this->setFont('Times','',11);
				$this->cell(8,6,'',0,0,'C',0); 
				$this->cell(100,6,'Tanpa mengurangi rasa hormat kami selaku bagian keuangan ingin menyampaikan sebuah pemberitahuan kepada',0,1,'L',1);    
				$this->cell(8,6,'',0,0,'C',0); 
				$this->cell(100,6,'yang bersangkutan mengenai tagihan iuran bulanan sekolah.',0,1,'L',1);
				$this->Ln(5);
				$this->cell(8,6,'',0,0,'C',0); 
				$this->cell(100,6,'Berdasarkan data yang kami miliki saudara memiliki tunggakan tagihan yang belum dilunasi, dengan rincian',0,1,'L',1);
				$this->cell(8,6,'',0,0,'C',0); 
				$this->cell(100,6,'sebagai berikut:',0,1,'L',1);
				
				$this->Ln(5);
				$this->setFont('Times','B',9);
                $this->setFillColor(190,193,193);
                $this->cell(65,6,'',0,0,'C',0); 
                $this->cell(30,6,'Bulan',1,0,'C',1);
                $this->cell(30,6,'Tagihan',1,0 ,'C',1);

                foreach ($iuran->result() as $key) {

                	$sisa_iuran=$key->total_tagihan;

                	foreach ($bayar->result() as $row) {
                		if($row->id_iuran==$key->id_iuran){
                			$sisa_iuran=$sisa_iuran-$row->jumlah_dibayarkan;
                		}
                	}

                	if($sisa_iuran<=0){

                	}else{
						$this->Ln(6);
						$this->setFont('Times','',9);
						$this->setFillColor(255,255,255);
                		$this->cell(65,6,'',0,0,'C',0); 
                		$this->cell(30,6,$key->bulan,1,0,'C',1);
                		$this->cell(30,6,$sisa_iuran,1,0 ,'C',1);
                	}
                	$total=$total+$sisa_iuran;
				}

					$this->Ln(6);
					$this->setFont('Times','B',9);
                	$this->setFillColor(255,255,255);
                	$this->cell(65,6,'',0,0,'C',0); 
                	$this->cell(30,6,'Total',1,0,'C',1);
                	$this->cell(30,6,$total,1,0 ,'C',1);


				
		$this->Ln(10);
		$this->setFont('Times','',11);
		$this->cell(8,6,'',0,0,'C',0); 
		$this->cell(100,6,'Kami harap siswa yang bersangkutan dapat melunasi tagihan yang telah kami rincikan diatas sesegera mungkin.',0,1,'L',1);		
		$this->cell(8,6,'',0,0,'C',0); 
		$this->cell(100,6,'Demikian apa yang ingin kami sampaikan, sekian terima kasih.',0,1,'L',1);
		

        $this->Ln(5);
        $this->setFont('Times','',12); 
        $this->cell(170,6,'Kepahiang, '.date('d M Y'),0,1,'R',1); 
        $this->cell(170,6,'Bagian Keuangan',0,1,'R',1);  
        $this->Ln(17);
        $this->cell(170,6,$nama,0,1,'R',1);
        $this->cell(170,6,$nip,0,1,'R',1);
	}
	
	function Footer()
	{

		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Times','I',10);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new ooo();
$pdf->AliasNbPages();
$pdf->AddPage('');

$pdf->content($bayar, $iuran, $nip, $nama, $siswa);
$pdf->Output();
?>