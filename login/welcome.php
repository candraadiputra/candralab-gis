<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
$username = $_SESSION['username'];
?>
<h4>Halaman  <?php echo $username;
?></h4>
<!--admin-->
<?php
if(!empty($username)){
?>
<div>
	<ul>
		<li class="span2 ">
			<div class="thumbnail">
				<img src="assets/img/rs.jpg" alt="">
				<div class="caption">
					<p style="text-align: center">
						<a href="index.php?mod=rumahsakit&pg=rumahsakit_view" class="btn btn-primary  btn-small">Rumah Sakit</a>
					</p>
				</div>
			</div>
		</li>
		<li class="span2 ">
			<div class="thumbnail">
				<img src="assets/img/gas.jpg" alt="">
				<div class="caption">
					<p style="text-align: center">
						<a href="index.php?mod=spbu&pg=spbu_view" class="btn btn-primary  btn-small">SPBU</a>
					</p>
				</div>
			</div>
		</li>
		<li class="span2 ">
			<div class="thumbnail">
				<img src="assets/img/police.jpg" alt="">
				<div class="caption">
					<p style="text-align: center">
						<a href="index.php?mod=titik&pg=titik_view" class="btn btn-primary  btn-small">Polisi</a>
					</p>
				</div>
			</div>
		</li>

	</ul>
</div>
<?php } ?>

