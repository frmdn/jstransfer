@extends('layout.master')

@section('content')

<div id="main">
	<div class="container">
		<div class="text-center">
			<h1>Transaksi</h1>
			<p>Data Lengkap Transaksi</p>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Bank</th>
					<th>Nominal</th>
					<th>Saldo Awal</th>
					<th>Saldo Akhir</th>					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Paijo</td>
					<td>BAC</td>
					<td>Rp 500.000,00</td>
					<td>Rp 1.000.000,00</td>
					<td>Rp 500.000,00</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection