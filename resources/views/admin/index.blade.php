@extends('layouts.adminLayouts.app')
@section('content')
    <div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Users</h4>
					<!-- /.box-title -->
					{{-- <div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else there</a></li>
							<li class="split"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div> --}}
					<!-- /.dropdown js__dropdown -->
					<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						@include('layouts.message')
						<div class="row">
							{{-- <div class="col-sm-6">
								<div class="dataTables_length" id="example_length">
									<label>Show <select name="example_length" aria-controls="example" class="form-control input-sm">
										<option value="10">10</option>
										<option value="25">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
									</select> entries</label>
								</div>
							</div> --}}
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
                                    Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 70px;">
                                    Profile type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 135px;">
                                    Role
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 110px;">
                                    Phone number
                                </th>
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196px;">
									Setting
								</th>
                            </tr>
						</thead>
						{{-- <tfoot>
							<tr>
								<th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Profile type</th><th rowspan="1" colspan="1">Role</th>
                                <th rowspan="1" colspan="1">Phone number</th>
                                <th rowspan="1" colspan="1">Id</th>
                            </tr>
						</tfoot> --}}
						<tbody>	
							@foreach ($users as $user)
								<tr role="row" class="odd">
									<a href=""><td>{{ $user->name }}</td></a>
									<td>{{ $user->email }}</td>
									<td>{{ $user->profileType }}</td>
									<td>{{ $user->role }}</td>
									<td>{{ $user->contact }}</td>
									<td class="sorting_1">
										{{-- <a class="btn btn-info btn-xs waves-effect waves-light">Show</a> --}}
										<a href="{{ route('makeUserAdmin', $user->id) }}" class="btn btn-warning btn-xs waves-effect waves-light"> Make admin</a>
										<a href="{{ route('adminDeleteUser', $user->id) }}" id="sal-warning" class="btn btn-danger btn-xs waves-effect waves-light">Delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing {{$users->count()}} of {{$users->total()}} entries</div>
				</div>
				<div class="col-sm-7">
					{{ $users->links() }}
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