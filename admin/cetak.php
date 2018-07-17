<body onLoad="javascript:print()">   
<?php 

include "../library/koneksi.php";
include "fungsi.php";
include_once("tglindo.php");
session_start();
?>
<?
//error_reporting(E_ALL ^ E_NOTICE);
$tgl=date('Y-m-d');
$tgl1=$_POST['tgl1'];
$bln1=$_POST['bln1'];
$thn1=$_POST['thn1'];
$tgl2=$_POST['tgl2'];
$bln2=$_POST['bln2'];
$thn2=$_POST['thn2'];
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
}

?> 
<h3 align="center" class="style1">Laporan Rekapitulasi</h3>

<div align="center">DARI TANGGAL  <?php echo"$tgl1";?> / <?php echo"$bln1";?>/ <?php echo"$thn1";?> SAMPAI DENGAN TANGGAL  <?php echo"$tgl2";?> / <?php echo"$bln2";?>/ <?php echo"$thn2";?></div>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#fff">
<tr>
<td width="9%" align="center" valign="left" bgcolor="#d3d3d3"><strong>No ID </strong></td>
<td width="12%" align="center" valign="middle" bgcolor="#d3d3d3"><strong>Kategori </strong></td>
<td width="25%" align="center" valign="middle" bgcolor="#d3d3d3"><strong>Judul </strong></td>
<td width="12%" align="center" valign="middle" bgcolor="#d3d3d3"><strong>Tanggal </strong></td>
<td width="12%" align="center" valign="middle" bgcolor="#d3d3d3"><strong>Jenis </strong></td>
<td width="18%" align="center" valign="middle" bgcolor="#d3d3d3"><strong>Uang Masuk </strong></td>
<td width="16%" align="center" valign="middle" bgcolor="#d3d3d3"><strong>Uang Keluar </strong></td>
</tr>
<?

$ambildata=mysql_query("SELECT * FROM uang WHERE tgl >= '$thn1-$bln1-$tgl1' AND tgl <= '$thn2-$bln2-$tgl2' and username = '$username'");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "Maaf data yang anda cari tidak ada";
}
$hitung=0;
$hitung1=0;
while($cetakdata=mysql_fetch_array($ambildata)){
$total_masuk=$cetakdata['jumlah'];
$hitung+=$total_masuk;
$total_keluar=$cetakdata['keluar'];
$hitung1+=$total_keluar;
$keseluruhan=$hitung-$hitung1;

?>

<tr>
<td bgcolor="#d3d3d3"><?=$cetakdata['kode']?></td>
<td bgcolor="#d3d3d3"><?=$cetakdata['kategori']?></td>
<td bgcolor="#d3d3d3"><?=$cetakdata['judul']?></td>
<td bgcolor="#d3d3d3"><?=TanggalIndo($cetakdata['tgl'])?></td>
<td bgcolor="#d3d3d3"><?=$cetakdata['jenis']?></td>
<td bgcolor="#d3d3d3"><?="Rp.".number_format((double)$cetakdata['jumlah']).",-"?></td>
<td bgcolor="#d3d3d3"><?="Rp.".number_format((double)$cetakdata['keluar']).",-"?></td>
</tr>
<? } ?>
<tr>

<td colspan="4" align="left" valign="middle" bgcolor="#fff"><div align="left"><strong>Total Uang Masuk</strong></div>
  <div align="center"><strong></strong></div>  <div align="center"><strong></strong></div>  <div align="center"><strong> </strong></div>  <div align="center"><strong> </strong></div></td>
  <td></td>
<td align="left" valign="middle" bgcolor="#fff"><strong>Rp.<?php echo number_format((double)$hitung);?>,- </strong></td>
</tr>
<tr>
<td colspan="5" align="left" valign="middle" bgcolor="#fff"><strong>
  <div align="left"><strong>Total Uang Keluar   </strong></div></td>
  <td></td>
<td align="left" valign="middle" bgcolor="#fff"><strong>Rp.<?php echo number_format((double)$hitung1);?>,-  </strong></td>
</tr>

<tr>
<td colspan="3" align="left" valign="middle" bgcolor="#fff"><strong>
  <div align="left"><strong>Total Uang </strong></div></td>
  <td colspan="3" bgcolor="#fff">Total Uang Masuk - Total Uang Keluar = </td>
<td align="left" valign="middle" bgcolor="#fff"><strong>Rp.<?php echo number_format((double)$keseluruhan);?>,-  </strong></td>
</tr>
</table>

<br>
							  <div class="col-lg-12 col-md-4" align="right">
								<?php echo TanggalIndo($tgl); ?> <br/><br/><br/><br/>
							  </div>