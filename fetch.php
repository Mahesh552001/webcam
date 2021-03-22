
<?php 
  

$user ='' ; 
$password = '';  
  

$database = '';  
  

$servername=''; 
$mysqli = new mysqli($servername, $user,  
                $password, $database); 

if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 

session_start();
$name = $_SESSION['Name'];
$email = $_SESSION['Email'];
  

$sql = "SELECT * FROM hospital WHERE name='$name' AND email='$email'"; 
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>User Details</title> 
   
    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: #006600; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
  
        td { 
            background-color: #E4F5D4; 
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
    </style> 
</head> 
  
<body> 
    <section> 
        <h1>Your Appointment</h1> 
        
        <table> 
            <tr>
			    <th>No.</th>
                <th>Name</th> 
                <th>Email</th> 
                <th>Date</th> 
                <th>Phone</th>
				<th>Message</th>

            </tr> 
           
            <?php     
                $rows = mysqli_fetch_row($result); 
             ?> 
            <tr> 
                <td><?php echo $rows[0];?></td>
                <td><?php echo $rows[1];?></td> 
                <td><?php echo $rows[2];?></td> 
                <td><?php echo $rows[3];?></td> 
                <td><?php echo $rows[4];?></td> 
				<td><?php echo $rows[5];?></td>
            </tr> 
        </table> 
    </section> 
</body> 
  
</html> 
