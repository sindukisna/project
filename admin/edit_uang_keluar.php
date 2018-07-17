<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysql_query("select * from uang where kode='".$_GET["nmr"]."'");
$editDb = mysql_fetch_assoc($edit);
	if($_POST["pasien"]){
			include_once("../library/koneksi.php");
			mysql_query("update uang set kategori='".$_POST["kategori"]."',  judul='".$_POST["nama"]."',  tgl='".$_POST["tgl"]."', keluar='".$_POST["usia"]."' where kode='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=uang_keluar'>";
			
	}
?>
<div class="span9">
	<div class="well" style="fixed:center;">
		<b>Edit Uang Keluar</b>
		<p style="margin-top:10px;">
			<form action="" method="post" class="form-horizontal">
			<div class="form-group">
							<label class="control-label col-lg-4">Kategori</label>
							<div class="col-lg-4">
								<input type="text" name="kategori" value="<?php echo $editDb["kategori"];?>" required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Judul</label>
							<div class="col-lg-4">
								<input type="text" name="nama" value="<?php echo $editDb["judul"];?>" required class="form-control" />
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-lg-4" for="dp1">Tanggal</label>
							<div class="col-lg-4">
								<input type="text" required name="tgl" value="<?php echo $editDb["tgl"];?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Jumlah</label>
							<div class="col-lg-4">
								<input type="text" required name="usia" value="<?php echo $editDb["keluar"];?>" class="form-control" />
							</div>
						</div>
						
						
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="pasien" value="Simpan" class="btn btn-primary" /> <a href="?menu=uang_keluar" class="btn btn-warning">Batal</a>
						</div>

					</form>
	</div>
</div>
<?php } ?>