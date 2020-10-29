@extends('layout.main')

@section('content')
<div class="header-part-list">
		<div class="status-line-head">
			@if(session()->get('save_status')!=null)
				@if(session()->get('save_status')) <span class='text-success'>Part save successful</span>
				@endif
			@else Parts list... 
			@endif
			
		</div>
		<div class="icon-add-part">
			<a class="btn btn-green btn-icon" href="/addpart">
		    	<i data-feather="plus"></i>
			</a>
		</div>
</div>
<div class="list-parts">
	
	@foreach($parts as $part)
	<div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-warning h-100 mb-2">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <div class="small font-weight-bold {{$part->colorStatus}} mb-1">{!!$part->stockStatus!!}</div>
                    <div class="h5">{{$part->part_number}} <span class="bg-success text-white" style="border-radius: 10px;    padding: 2px 5px;">${{$part->price}}</span></div>
                    <div class="text-xs font-weight-bold text-secondary d-inline-flex align-items-center">
                        {{$part->job_number}}
                    </div>
                </div>
                <div class="ml-2"><a href=?buy={{$part->id}}><i class="fa fa-check fa-2x text-gray-500"></i></a></div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@stop