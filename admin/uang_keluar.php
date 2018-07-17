<?php
include_once("../library/koneksi.php");
include_once("tglindo.php");
session_start();
#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
$pageSql = "SELECT * FROM uang";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

}else
echo "error";
?>
<a href="?menu=tambah_uang_keluar" class="btn btn-primary btn-rect"><i class='icon icon-white icon-plus'></i> Tambah</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Manajemen Uang Keluar
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
					<th>No</th>
						<th>No ID</th>
						<th>Kategori</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Jumlah</th>
						
						<th>Aksi</th>
					</tr>
				</thead>
			<?php
				$pasienSql = "SELECT * FROM uang where jenis='Keluar' AND username = '$username' ORDER BY kode DESC LIMIT $hal, $row";
				$pasienQry = mysql_query($pasienSql, $server)  or die ("salah : ".mysql_error());
				$nomor  = 0; 
				while ($pasien = mysql_fetch_array($pasienQry)) {
				$nomor++;
			?>
				<tbody>
					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $pasien['kode'];?></td>
						<td><?php echo $pasien['kategori'];?></td>
						<td><?php echo $pasien['judul'];?></td>
						<td><?php echo TanggalIndo($pasien['tgl']);?></td>
						<td>Rp.<?php echo number_format($pasien['keluar']) ?>,-</td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=hapus_uang_keluar&aksi=hapus&nmr=<?php echo $pasien['kode']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA INI ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=edit_uang_keluar&aksi=edit&nmr=<?php echo $pasien['kode']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="7" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=uang_keluar&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>