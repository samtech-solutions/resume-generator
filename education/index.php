<?php
include "../connection.php";

session_start();

$current_user_id =$_SESSION['user-id'];

$query = "SELECT * FROM education WHERE userid='$current_user_id'";

$result = mysqli_query($conn , $query) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cv+ resume</title>
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css2/css/styles2.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../fonts/css/all.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" media="all"/>
	<script src="../external/jquery/jquery.js"></script>
    
       
</head>
<style>

</style>
<body> 
   
     <div class="container">
            <h3 align="center">CV+ GENERATOR</h3>
               <progress id="progressBar" value="40" max="100"
                style="width:420px;height:15px;"></progress>
            <h6 id="status" style="color:red">Phase 4 of 10</h6>

            <hr>

            <div class="title">
			    <div class="center">
				  <a href="index.php"><button id="header" class="btn  btn-xs" style="width:200px">Education Background</button></a>
			    </div>
                <br>
            </div>

         <div class="table-responsive" id="user_data">
		 <table class="table">
         <thead>
           <tr>
             <th>Year From</th>
             <th>Year To</th>
             <th>Education Level</th>
             <th>Achievement</th>			 
			 <!-- Button trigger modal -->
			 <div style="text-align:right">
			    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >
				  <i class="fa fa-phone fa-plus"></i> Add
			     </button>
			 </div>
			 
			
           </tr>
         </thead>
         <?php
          while($row =$result->fetch_assoc()):
         ?>
         <tr>
           <td style="height:auto"><?php echo $row['yearfrom']; ?></td>
           <td><?php echo $row['yearto']; ?></td>
		   <td style="height:auto"><?php echo $row['educationlevel']; ?></td>
           <td><?php echo $row['achievement']; ?></td>
           
         </tr>
          <?php endwhile; ?>
         </table>     
        </div>
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Education Background</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  
			  <form action="education.php" method="POST">
				  <div class="modal-body">
				    <p style="color:red">***NOTE:Enter your Education Background from the lowest level to the Highest Level.</p>
					<label> Year From :</label> <input id="yearfrom" name="yearfrom"  class="form-control" placeholder="Enter start year(1990)" required>
					   
					 <br>
					 <label>Year To :</label> <input id="yearto" name="yearto"  class="form-control"  placeholder="Enter end year(1998)" required>
					  
					 <br>
					 <label> School/College/University :</label> <input id="educationlevel" name="educationlevel"  class="form-control" placeholder="Enter your education level(school,college,university)"  required>
					   
					 <br>
					 <label>Achievement :</label> <input id="achievement" name="achievement"  class="form-control" placeholder="Enter your achievment(i.e Pass,A)" required>
					  
					 <br>
					 
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Close</button>
					<button  type="submit" name="save" id="save" class="btn btn-info" 
					data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-save" aria-hidden="true"></i> Save </button> 
				  </div>
			  </form>
     
			</div>
		  </div>
		</div>
       
   
   <div style="text-align:center">
      
	  
      <a href="../job/index.php"><button  class="btn btn-success btn-xs" style="width:auto"> <i class="fa fa-briefcase" aria-hidden="true"></i> Job Experience</button></a>
   </div>
   </div>
   
       <div id="pop-up" >
          <div id="close-btn">x</div>
          <h1 style="text-align:center;color:green">Support Us </h1>
          <h4>Donate to support Our Hosting and Maintenance charges.</h4>
          <a href="../donation.html" target="_blank">Make Your Donation -><a>
		  <br>
		  <br>
          <p>Thanks for supporting Us.</p>   
        </div>
		
   <script src="../js/custom.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>