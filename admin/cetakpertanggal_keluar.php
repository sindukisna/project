<?php 

include "../library/koneksi.php";
include "fungsi.php";
include_once("tglindo.php");
session_start();
?>
<?php 


$tgl=date('Y-m-d');
$tglorder=$_POST['tanggal'];
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
}
$sql=mysql_query("select * from uang
where tgl like '$_POST[tanggal]%' and jenis='Keluar' and username = '$username' order by kode asc") or die
(mysql_error());
?>
    

<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<body onLoad="javascript:print()">   
                            <table width="100%">
							<tr>
							<td><div align="center">
							  <h4 align="center" class="style1">Laporan Uang Keluar</h4></td>
							</tr>
							</table>
                        </div>
						<form name="sda" role="form" method="post">
                        <div class="panel-body">
						 <div class="col-lg-12">
                        	<div class="row">
							<CenteR>Laporan Uang Keluar Per-Tanggal :  <?php echo TanggalIndo($_POST['tanggal']);?>
							</center>
										<br>
										   <div class="dataTable_wrapper">
                                <table width="100%" border="1" class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th bgcolor="#d3d3d3">No</th>
											<th bgcolor="#d3d3d3">No ID</th>
                                            <th bgcolor="#d3d3d3">Kateori</th>
                                            <th bgcolor="#d3d3d3">Judul</th>
											<th bgcolor="#d3d3d3">Tanggal</th>
											
											<th bgcolor="#d3d3d3">Jumlah</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no1=1;
										$total=0;
										
										while($data=mysql_fetch_array($sql)){
										?>	
			   
										<tr>
											<td ><?php echo $no1; ?></td>
											<td><?php echo $data['kode']; ?></td>
											<td><?php echo $data['kategori']; ?></td>
											<td><?php echo $data['judul']; ?></td>
											<td><?php echo TanggalIndo($data['tgl']);?></td>
											<td><?php echo  "Rp.".number_format($data['keluar']).",-" ?></td>
											
										</tr>
										<?php
											$no1++;
											$total=$total+$data['keluar'];
										}
										?>
										<Tr>
										<th colspan="4">Total Keseluruhaan</th>
										<td></td>
										<Td>Rp.<?php echo number_format($total) ; ?>,-</td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
							</div>
						  </div>
						
							 
							  <div class="col-lg-12 col-md-4" align="right">
								<?php echo TanggalIndo($tgl); ?> <br/><br/><br/><br/>
							  </div>
</form>
