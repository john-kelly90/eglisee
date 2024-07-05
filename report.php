<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/mysqli/conn.php");
?>

<?php 

   if (isset($_SESSION['emailAd'])) {
	?>
    
	<div class="box-container">

		</div>

		<div class="report-container">
			<div class="report-header">
				
			<button class="view" onclick="window.location='<?php echo base_url;?>imprimer.php'"><img src="../images/images/add.png" alt=""> Imprimer</button>
			</div>
			
				<!-- Datatable -->
				<div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
				<center><table id="myTable" border="2" cellspacing="0" cellpadding="0"  class="table table-striped" id="data_tables">
						<thead>
						 <tr>
							<th></th>
						    <th>ISHURE</th>
							<th class="vertical">ABANDITSWE</th>
							<th class="vertical">ABAJE</th>
							<th>%</th>
							<th class="vertical">ABASHITSI</th>
							<th class="vertical">BOSE HAMWE</th>
							<th class="vertical">ABABWIYE UBUTUMWA ABANDI</th>
							<th>%</th>
							<th class="vertical">ABAGENDEREYE ABARWAYI</th>
							<th>%</th>
							<th class="vertical">ABAGENDEREYE ABAFUNZWE</th>
							<th>%</th>
							<th class="vertical">ABIZERA BAFASHIJE ABANDI</th>
							<th>%</th>
							<th class="vertical">ABIZE INDWI</th>
							<th>%</th>
							<th class="vertical">GUSENGERA MUMURYANGO</th>
                            <th>%</th>
							<th class="vertical">ABAGIZE COMANDE</th>
							<th class="vertical" style="width:50px;" >% GEN</th>
							<th>PLACE</th>
							
						</tr>
						</thead>
						<tbody>
						 <?php
				//prepare request 
				$sql = "SELECT s.school_name, COUNT( DISTINCT st.studentID) AS 'total_etudiant',
				count( distinct a.studentID) AS 'total_present_calls', 
				(c.commende) AS 'total_comande', 
				(c.visitor) AS 'total_visitors',
				(c.parole) AS 'total_words',
				(c.visitor_seek) AS 'total_visite_seek',
				(c.visitor_prison) AS 'total_prison',
				(c.gift) AS 'total_aide',
				(c.week_study) AS 'total_week',
				(c.familly_prayer) AS 'total_familly'
				  FROM calls c
				   JOIN appels a  ON a.schoolID = c.schoolID
				  JOIN 
					schools s ON s.schoolID = a.schoolID 
				  join students st on st.schoolID=s.schoolID
					WHERE a.appel like '%pr%'
					GROUP BY s.school_name";
			
                            $result = $conn->query($sql);
								?> 		
							<tr>
								<?php
								    $totper1=$totper2=$totper3=$totper4=0;
									$totper5=$totper6=$totper7=0;
                                      $totper=$pres=$visi=$et=0 ;
									  $word=$seek=$aide=$prison=0;
									  $study=$familly=$cmd=0;
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
										//$i=1;
                                        while ($row = $result->fetch_assoc()) {

								?>
							
							<td><?php //echo  $i ?></td>
								<td><?php echo htmlspecialchars($row['school_name'])?></a></td>
								<?php  //$i++;?>
								<td><?php echo $row['total_etudiant'] ?></td>
								<?php $et=$et+ $row['total_etudiant']?>
								<td><?=$row['total_present_calls'] ?></td>
								<?php $pres=$pres+ $row['total_present_calls']?>
								<td><?php
                                    $ker=number_format(($row['total_present_calls']*100)/$row['total_etudiant'],2);
								   $per= ($ker==100.00) ? 100 : $ker;
								   echo $per ;
                                    $totper1=$per;
								 ?></a></td>
								<td><?php echo $row['total_visitors'] ?></td>
								<?php $visi=$visi+ $row['total_visitors']?>
								<td><?php echo $row['total_visitors']+$row['total_present_calls'] ?></td>
								<td><?php echo $row['total_words'] ?></td>
								<?php $word=$word+ $row['total_words']?>
								<td><?php
                                    $ker=number_format(($row['total_words']*100)/$row['total_etudiant'],2);
								   $per= ($ker==100.00) ? 100 : $ker;
								   echo $per ;
								   $totper2= $per;
								 ?></a></td>
                                 <td><?php echo $row['total_visite_seek'] ?></td>
								 <?php $seek=$seek+ $row['total_visite_seek']?>
								 <td><?php
                                    $ker=number_format(($row['total_visite_seek']*100)/$row['total_etudiant'],2);
								   $per= ($ker==100.00) ? 100 : $ker;
								   echo $per;
								   $totper3=$per; 
								 ?></a></td>
								 <td><?php echo $row['total_prison'] ?></td>
								 <?php $prison=$prison+ $row['total_prison']?>
								 <td><?php
                                    $ker=number_format(($row['total_prison']*100)/$row['total_etudiant'],2);
								   $per= ($ker==100.00) ? 100 : $ker;
								   echo $per;
								   $totper4=$per; 
								 ?></a></td>
								 <td><?php echo $row['total_aide'] ?></td>
								 <?php $aide=$aide+ $row['total_aide']?>
								 <td><?php
                                    $ker=number_format(($row['total_aide']*100)/$row['total_etudiant'],2);
								   $per= ($ker==100.00) ? 100 : $ker;
								   echo $per ;
								   $totper5=$per;
								 ?></a></td>
								 <td><?php echo $row['total_week'] ?></td>
								 <?php $study=$study+ $row['total_week']?>
								 <td><?php
                                    $ker=number_format(($row['total_week']*100)/$row['total_etudiant'],2);
								   $per= ($ker==100.00) ? 100 : $ker;
								   echo $per ;
								   $totper6=$per;
								 ?></a></td>
								  <td><?php echo $row['total_familly'] ?></td>
								  <?php $familly=$familly+ $row['total_familly']?>
								  <td><?php
                                    $ker=number_format(($row['total_familly']*100)/$row['total_etudiant'],2);
								   $per= ($ker==100.00) ? 100 : $ker;
								   echo $per ;
								   $totper7=$per;
								 ?></a></td>
								 <td><?php echo $row['total_comande'] ?></td>
								 <?php $cmd=$cmd+ $row['total_comande']?>

								 <td><?php $gen=number_format(($totper1+$totper2+$totper3+$totper4+$totper5+$totper6+$totper7)/7,2) ;
								 
								 $pir=($gen==100.00) ? 100 : $gen;
								 
								 echo $pir ;
								 ?></td>
								<td></td>
								 
							</tr>
							
							<?php
                             }
							}
							?>
							<tr>
							
								<td colspan="2" >TWESE HAMWE</td>
								<td><?php echo $et ?></td>
								<td><?php echo $pres ?></td>
								<td></td>
								<td><?php echo $visi ?></td>
								<td></td>	
								<td><?php echo $word ?></td>
								<td></td>
								<td><?php echo $seek ?></td>
								<td></td>
								<td><?php echo $prison ?></td>
								<td></td>
								<td><?php echo $aide ?></td>
								<td></td>
								<td><?php echo $study ?></td>
								<td></td>
								<td><?php echo $familly ?></td>
								<td></td>
								<td><?php echo $cmd ?></td>
                                <td></td>
   <td></td>
							</tr>
						</tbody>
					</table>
   
  <?php
	} 
	else {
	?>
  <script>
	alert("You are not Admin!");
	window.location='./index.php';
</script>
<?php
} 
?>
</body>
    
    <script>
        function printTable() {
            var printContents = document.getElementById("myTable").outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            
        }
</script>


<script>
        // function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = parseInt(rows[i].getElementsByTagName("TD")[20].innerHTML);
                    y = parseInt(rows[i + 1].getElementsByTagName("TD")[20].innerHTML);
                    if (x < y) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        
			updateRanking();
			function updateRanking() {
            var table = document.getElementById("myTable");
            var rows = table.rows;
            for (var i = 1; i < rows.length; i++) {
            var k = (i<=1) ? "ére":"éme";
                rows[i].getElementsByTagName("TD")[21].innerHTML = i+k;
                
            }
        }

			</script>
 
</body>
</html>

