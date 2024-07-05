<?php 

  session_start();
  require_once("./root.php");
 
  include(Root_path."db_connection/pdo/conn.php");
?>

<?php 

   if (isset($_SESSION['emailAd'])) {
	$schoolID=$_GET['id'];
	?>
<br><br>
<center><h3>
<?php 
    $schoolID=$_GET['id'];
    $if1="SELECT * FROM students st  join schools s on s.schoolID=st.schoolID
           left join appels a on a.studentID=st.studentID    
     where st.schoolID=$schoolID order by  st.name , st.surname desc ";


       $i=1;
       $req = $conn->query($if1);
       $row= $req->fetch() ;
       echo  $row['school_name'] ;
   
   ?>
   
	 <center><table border="1" cellspacing="0"  id="data_tables">
						<thead>
						 <tr>
						    <th>N°</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Naissance</th>
                            <th>Télphone</th>
                            <th>Commune</th>
                            <th>Quartier</th>
                            <th>Avenue</th>
                            <th>N.Avenue</th>
						</tr>
						</thead>
						<tbody>
						 <?php

                         $schoolID=$_GET['id'];
                         $if="SELECT * FROM students st  join schools s on s.schoolID=st.schoolID
                                left join appels a on a.studentID=st.studentID    
                          where st.schoolID=$schoolID order by  st.name , st.surname desc ";


                            $i=1;
						    $req = $conn->query($if);
								?> 	
									
							<tr>
								<?php
								  
								  while ($fetch = $req->fetch()){

								?>
								<td><?php echo $i?></td>
						
								<td><?php echo htmlspecialchars($fetch['name']);$i++?></a></td>
								<td><?php echo htmlspecialchars($fetch['surname']) ?></td>
								<td><?php echo htmlspecialchars($fetch['date_naissance']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['telephone']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['commune']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['quarter']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['street']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['street_number']) ?></td>
								</tr>
                            
							<?php
							}
							?>
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


                    

