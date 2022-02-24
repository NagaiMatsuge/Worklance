@extends('layouts.adminLayouts.app')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
                    <h4 class="box-title">Skills</h4>
                        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        @include('layouts.message')
                        <form action="{{ route('updateSkill', ['id' => $skill->id]) }}" method="POST" class="form-group">
                            @csrf
                            <input value="{{ $skill->name }}" name="name" placeholder="Skill name" class="form-control" type="text">
                            <button class="btn btn-success">Update</button>
                        </form>
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