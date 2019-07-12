@extends('layouts.app')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap4.css') }}">

@endsection
@section('content')

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1>جداول  مشخصات اسلایدرها</h1>
		          </div>
		          
		        </div>
	        </div><!-- /.container-fluid -->
	    </section>

		<!-- Main content -->
	    <section class="content" id="slider">
	        <div class="row">
		        <div class="col-12">
		            <div class="card">
			            
			            <!-- /.card-header -->
			            <div class="card-body">
			                <slider_table :sliders="{{ $sliders }}"></slider_table>
			            </div>
			            <!-- /.card-body -->
		            </div>
		          <!-- /.card -->
		        </div>
	        </div>
		</section>
	</div>
@endsection

@section('js')
<!-- DataTables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap4.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/slider.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
        "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
        "info" : false,
    });
    
  });
</script>
@endsection