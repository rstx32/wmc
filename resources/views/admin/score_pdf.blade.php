<!DOCTYPE html>
<html>
<head>
	<title>Live Scoring Challenge</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <h5>Live Scoring Challenge</h4>
    </center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Ranking</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Skor</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($score as $s)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$s->name}}</td>
				<td>{{$s->email}}</td>
				<td>{{$s->skor}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>