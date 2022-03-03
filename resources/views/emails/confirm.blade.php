<!DOCTYPE html>
<html>
<head>
	<title>RESERVING DATE</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col justify-content-center">
			<h1 class="text-success text-uppercase">Verfications E-mail</h1>

			<div class="col-4">
				<span>Welcome to Our Hospital Mr .. <strong>{{$customr['name']}} </strong></span>
				<p> 
					Your Are Registered On This E-mail-id Is .<strong> {{$customr['email']}} </strong>
					We Are Accepting Your Reqeust Already .
				</p>
			<span>	Now We Inform You On This your E-mail To See you Doctor On Same Date .. <strong>{{$customr['attend']}} </strong>.. And On The Same Time . <strong> {{$customr['time']}} </strong>  .You Are Reserved </span>
			<p> Thanks For Interesting To Our Hospital Mr .. <strong>{{$customr['name']}} </strong>.</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>