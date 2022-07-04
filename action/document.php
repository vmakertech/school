
<?php
session_start();
include('conn.php');

 
$qu = mysqli_query($conn, "select * from collage where id = ".$_GET['id'] );
while($res = mysqli_fetch_array($qu)){
?>



 
  <td><?php echo $res['id']; ?></td> <br>
  <td><?php echo $res['class']; ?></td> <br>
  <td><?php echo $res['firstName']; ?></td> 
  <td><?php echo $res['lastName']; ?></td><br>
  <td><?php echo $res['paymentStatus']; ?></td><br>
  <td><?php echo $res['fatherEmail']; ?></td><br>
  <td><?php echo $res['gander']; ?></td>  <br>
  <td><?php echo $res['isEws']; ?></td>  <br>
  <td><?php echo $res['paymentId']; ?></td>  <br>
  <td><img src="../assest/candidatePicture/<?php echo $res['candidatePicture']; ?>" width="100px" height="100px"/></td>
  <td><img src="../assest/candidateSignature/<?php echo $res['candidateSignature']; ?>" width="100px" height="100px"/></td>



<?php
}
?>
