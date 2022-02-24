@extends('layouts.adminLayouts.app')
@section('content')
    <div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
                    <h4 class="box-title">Publications</h4>
                        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						@include('layouts.message')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="example_filter" class="dataTables_filter">
                                        <label>Search: <input type="search" class="form-control input-sm" placeholder="" aria-controls="example"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 293px;">
                                        Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 144px;">
                                        About
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196px;">
                                        Setting
                                    </th>
                                </tr>
                                </thead>
                                    <tbody>	
                                        @foreach ($posts as $post)
                                            <tr role="row" class="odd">
                                                <a href=""><td>{{ $post->name }}</td></a>
                                                <td>{{ $post->about }}</td>
                                                    <td>
                                                        <a style="margin-right:10px;" class="btn btn-info btn-xs waves-effect waves-light">Show</a>
                                                        <a style="margin-right:10px;" class="btn btn-warning btn-xs waves-effect waves-light">Edit</a>
                                                        <a href="{{ route('adminDeletePost', $post->id) }}" id="sal-warning" class="btn btn-danger btn-xs waves-effect waves-light">Delete</a>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing {{$posts->count()}} of {{$posts->total()}} entries</div>
                            </div>
                            <div class="col-sm-7">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->		
		<footer class="footer">
			<ul class="list-inline">
				<li>2020 © Worklance.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div>
@endsection