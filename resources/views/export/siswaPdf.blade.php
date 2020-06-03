<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>

</head>
<body>
	<h1>Data Siswa</h1><br>
	<center>

	<table>
		<thead>
			<tr>
				<th>Nama Lengkap</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Rata - Rata Nilai</th>
			</tr>
		</thead>
		<tbody>
			@foreach($siswa as $siswa)
			<tr>
				<td>{{$siswa->nama_lengkap()}}</td>
				<td>{{$siswa->jenis_kelamin}}</td>
				<td>{{$siswa->agama}}</td>
				<td>{{$siswa->nilaiRataRata()}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	</center>
</body>
</html>

