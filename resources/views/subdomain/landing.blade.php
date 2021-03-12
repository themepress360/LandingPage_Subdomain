<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
	<h2>Dear <?php echo $is_subdomain_exists['first_name']; ?></h2> <br>

	   <h2>  Welcome to Your Landing Page </h2>
	
	<div class="alert alert-success" role="alert">
  Your Referrel Link is : <?php echo $is_subdomain_exists['referral_link']; ?>
</div>
	
</body>
</html>