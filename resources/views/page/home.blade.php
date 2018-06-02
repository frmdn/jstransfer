@extends('layout.master')

@section('content')
<div id="main">
	<div class="container">
		<div class="text-center">
			<h1>Customer</h1>
			<p>Data Lengkap Customer</p>
		</div>

		<table class="table table-bordered" id="data-customer">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Bank</th>
					<th>Rekening</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal-view">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Data Customer</h5>
				<button class="close" type="button" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" id="nama-customer" name="nama-customer" class="form-control" placeholder="Nama Customer">
					</div>
					<div class="form-group">
						<label>Bank</label>
						<input type="text" id="nama-bank" name="nama-bank" class="form-control" placeholder="Bank">
					</div>
					<div class="form-group">
						<label>Rekening</label>
						<input type="text" id="norek" name="norek" class="form-control" placeholder="Rekening">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal-transaksi">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Buat Transaksi</h5>
				<button class="close" type="button" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row">
						<div class="col-6">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama Customer">
						</div>
						<div class="col-6">
							<label>Bank</label>
							<input type="text" name="bank" class="form-control" placeholder="Bank">
						</div>
					</div>
					<div class="form-group">
						<label>Nominal</label>
						<input type="text" name="nominak" class="form-control" placeholder="Nominal">
					</div>
					<div class="form-group">
						<label>Metode Transfer</label>
						<select class="form-control">
							<option>-- Pilih Metode --</option>
							<option>ATM Link</option>
							<option>M-Banking</option>
						</select>
					</div>
					<div class="form-row">
						<div class="col">
							<label>Admin</label>
							<input type="text" class="form-control" name="">
						</div>
						<div class="col">
							<label>Pulsa</label>
							<input type="text" class="form-control" name="">
						</div>
						<div class="col">
							<label>Tarif</label>
							<input type="text" class="form-control" name="">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')

<script>
	$(document).ready(function () {
		$('#data-customer').DataTable({
			"columns" : [
				{ "data" : "id" },
				{ "data" : "nama_customer" },
				{ "data" : "nama_bank" },
				{ "data" : "norek" },
				{
					"data" : null,
					"render": function (data, type, row) {
                    return '<button class="btn btn-default mr-1" onclick="viewModal(' + row.id + ')">' +
                        '<i class="fa fa-eye"> </i>' +
                        '</button>'
                    +
                        '<button class="btn btn-primary" data-toggle="modal" data-target="#modal-transaksi">' +
                        '<i class="fa fa-edit"> </i>' +
                        '</button>'
                }
				}
			],
          	"ajax": {
          		"url": "http://localhost/jstransfer/public/api/customers",
          		"type": "GET"
          	},
      	});
	});

	function viewModal(id) {
		$.ajax({
			url : "http://localhost/jstransfer/public/api/customer/"+id,
			type : "get",
			dataType: "json",
			success : function(x) {
				$('#nama-customer').val(x.data.nama_customer);
				$('#nama-bank').val(x.data.nama_bank);
				$('#norek').val(x.data.norek);
				$('#modal-view').modal('show');
			}
		});
	}

	// function addTrx() {
	// 	var Trx = [];
	// 	Trx.customer_id = ;
	// 	Trx.nama_customer = ;
	// 	Trx.norek = ;
	// 	Trx.bank_id = ;
	// 	$.ajax({
	// 		url	: "http://localhost/jstransfer/public/api/customer",
	// 		data : $.serialize(Trx),
	// 		type : "post",
	// 		success : function(data)  {

	// 		}
	// 	});
	// }
</script>

@endsection