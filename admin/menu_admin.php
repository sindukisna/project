       <div id="left">
            <ul id="menu" class="collapse">
                <li><a href="?menu=uang_masuk"><i class="icon-money"> </i> Uang Masuk</a></li>
                <li><a href="?menu=uang_keluar"><i class="icon-money"></i> Uang Keluar</a></li>
                <li><a href="?menu=laporanpertanggal"><i class="icon-book"></i> Laporan Uang Masuk</a></li>
                <li><a href="?menu=laporan_uang_keluar"><i class="icon-book"></i> Laporan Uang Keluar</a></li>
                <li><a href="?menu=laporanrekapitulasi"><i class="icon-file"></i> Laporan Rekapitulasi</a></li>

              	<li><a href="logout.php"><i class="icon-signout"></i> Logout</a></li>
            </ul>
        </div>
		
		
		<div id="content">
            <div class="inner">
                
       			<br>
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
						<?php
						if($_GET["menu"]){
							include_once("load.php");
						}else{
							echo "";
						}
						?>
					</div>
                </div>
                  <!--END BLOCK SECTION -->
               
            </div>
        </div>