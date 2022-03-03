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
				<span>Welcome to Our Hospital Mr .. <strong> {{$customer['name']}} .. </strong></span>
				<p> 
					Your Are Registered On This E-mail-id Is . <strong>{{$customer['email']}} .</strong>
					We Are Accepting Your Reqeust .
				</p>
			<span>	We Will Inform You Shortly On This your E-mail To See you Doctor</span>
			<p> Thanks For Interesting To Our Hospital Mr .. <strong> {{$customer['name']}} </strong>.</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>