<!DOCTYPE html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="author" content="{{ Config::get('general.author') }}" />
	<meta name="keywords" content="{{ Config::get('general.keywords') }}" />
	<meta name="description" content="{{ Config::get('general.description') }}" />

	<title>
		{{ Config::get('general.title') }}
	</title>

	<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
	<link rel="icon" href="{{ asset('assets/favicon.ico') }}">

	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

	<style>
		body {
			margin: auto auto;
			padding: 20px 0;
			width: 100%;
			height: 100%;
			color: #B0BEC5;
			display: table;
			font-weight: 100;
			font-family: 'Lato';
		}

		.container {
			text-align: center;
			display: table-cell;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 96px;
			margin-bottom: 10px;
		}

		.quote {
			font-size: 32px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="content">
			<img src="/images/rakko.jpg">
			<div class="title">
				{{ Config::get('general.title') }}
			</div>
			<div class="quote">{{ Inspiring::quote() }}</div>
		</div>
	</div>
</body>

</html>
