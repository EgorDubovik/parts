@extends('layout.main')

@section('content')
<div class="header-part-list">
		<div class="status-line-head">
			Parts list... 
		</div>
		<div class="icon-add-part">
			<a class="btn btn-green btn-icon" href="/addpart">
		    	<i data-feather="plus"></i>
			</a>
		</div>
</div>
<div class="list-parts">
	<div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <div class="small font-weight-bold text-success mb-1">Clicks</div>
                    <div class="h5">11,291</div>
                    <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                        <i class="mr-1" data-feather="trending-up"></i>
                        12%
                    </div>
                </div>
                <div class="ml-2"><i class="fas fa-mouse-pointer fa-2x text-gray-200"></i></div>
            </div>
        </div>
    </div>
</div>

@stop