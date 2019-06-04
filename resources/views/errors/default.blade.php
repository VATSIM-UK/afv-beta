<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/errors/css/custom.css">
    <title>AFV | {{ $exception->getStatusCode() }} - Something's not quite right...</title>
</head>


<body>
	<div class="row vh-100 col-12 mx-0 align-items-center">
		<div class="row col-12 col-sm-12 col-md-7 col-lg-7 mx-auto mb-3 mb-sm-3 mb-md-0 mb-lg-0">
			<h1 class="col-12 text-left-lg text-left-md text-center-sm text-center-xs error-code">
				{{ $exception->getStatusCode() }}
			</h1>
			<span class="col-12 text-left-lg text-left-md text-center-sm text-center-xs error-text">
				Oops... looks like we must #BlameAidan
			</span>
		</div>
		
		<div class="row col-12 col-sm-12 col-md-5 col-lg-5 px-5 ml-0 mr-auto mb-0">
			<img class="img-fluid" src="/errors/img/AStevens.png">
		</div>
	</div>
  </body>
</html>