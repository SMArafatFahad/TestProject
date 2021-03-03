<?php
include('includes/config.php');
if(isset($_POST['submit']))
{



$name=$_POST['name'];
$age=$_POST['age'];
$team=$_POST['team'];
$playing_position=$_POST['playing_position'];
$password="12345";
  
    
$sql ="INSERT INTO add_player(name,age,team,playing_position,password) VALUES(:name, :age,:team,:playing_position,:password)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':age', $age, PDO::PARAM_STR);
$query-> bindParam(':team', $team, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);

$query-> bindParam(':playing_position', $playing_position, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Player added Sucessfull!');</script>";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>


<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Manage Users</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>

</head>

<body background="football10.JPG">>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Add Users</h2>

						<!-- Zero Configuration Table -->
					     <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Age<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="age" class="form-control" required>
                            </div>
                            </div>

                           

                            <label class="col-sm-1 control-label">Team<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                             <?php 
                             
        $query = "SELECT * FROM add_team";
        $query = $dbh->query($query);
       echo "<select name='team'>";
        while($data = $query->fetch(PDO::FETCH_ASSOC)){
        	
       echo "<option value='".$data['team_name']."'>".$data['team_name']."</option>";
    }
    echo $data['name'];
    echo "</select>";
     ?> </div>
                             <label class="col-sm-1 control-label">Playing Position<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="playing_position" class="form-control" required>
                            </div>
                            </div>

                             
                           
                            </div>

								<br>
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                </form>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
		</script>
		
</body>
</html>
