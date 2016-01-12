<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
function menu($sessi){
	switch($sessi){
		case 'admin': {
	

?>
 <div class=" well sidebar-nav" >
            <ul class="nav nav-list ">
   <li class="nav-header">Menu</li>
	
		
			<li>
				<a href="index.php?mod=login&pg=welcome"  title="Halaman Depan"><i class='icon-home'></i>Home</a>
			</li>
	 <li class="nav-header">Wilayah</li>
			<li>
				
	<a href="index.php?mod=provinsi&pg=provinsi_view"> <i class='icon-folder-close'></i>Provinsi</a>
</li>
	<li>
				
	<a href="index.php?mod=kab&pg=kab_view"> <i class='icon-folder-close'></i>kabupaten</a>
</li>

	<li>
	 <li class="nav-header">Lokasi</li>
			<li>			
	<a href="index.php?mod=rumahsakit&pg=rumahsakit_view"> <i class='icon-home'></i>Rumah sakit</a>
</li>
	<li>
				
	<a href="index.php?mod=spbu&pg=spbu_view"> <i class='icon-tint'></i>SPBU</a>
</li>
 <li>
				
	<a href="index.php?mod=polisi&pg=polisi_view"> <i class='icon-list'></i>Pos Polisi</a>
</li>
				
	
	 <li class="nav-header">System</li>


<li>
	<a href="index.php?mod=admin&pg=admin_view"><i class='icon-user'></i> Admin</a>
</li>


			
		</ul>
 </div>
        </div>
<?php		}
			break;

			default:
			{?>
 <div class="  sidebar-nav" >
           
            	<?php
            	include ('peta/depan.php');?>
         
           </div>
             </div>
<?php
} //end of case no login;
} //end of switch
} //end of function
