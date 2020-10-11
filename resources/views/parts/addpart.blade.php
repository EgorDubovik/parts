@extends('layout.main')

@section('content')
<div class="header-part-list">
		<div class="status-line-head">
			@if(isset($save_status))
				@if(!$save_status) <span class="text-danger">Error save part</span>
				@endif
			@else Add part...
			@endif
		</div>
</div>
<div class="container p-2" style="padding-top:20px; ">
	<div class="row">
		<div class="col-lg-9">
			<div class="card">
				<div class="card-body">
					<form method="post">
						@csrf
						<input type="hidden" name="event" value="add_part">
						<div class="form-group">
							<label for="part_number">Part number</label>
							<input type="text" class="form-control" id="part_number" name="part_number">
						</div>
						<div class="form-group">
							<label for="job_number">Job # | Customer name</label>
							<input type="text" class="form-control" id="job_number" name="job_number">
						</div>
						<hr>
						<div class="form-group">
							<button class="btn btn-green btn-block" type="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@stop