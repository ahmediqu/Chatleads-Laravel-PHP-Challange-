@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
	<div class="row justify-content-center">
		@foreach($flims as $data)
		<div class="col-md-4">
			<div class="card">
				<img src="{{$data->photo}}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">{{$data->name}}</h5>
					<p class="card-text font-weight-bold">Release : {{$data->release}}</p>
					<a href="{{url('details',$data->slug)}}" class="btn btn-primary d-block">Details</a>
				</div>
			</div>
		</div>
		@endforeach
		<div class="mt-3">
		{{$flims->links()}}
		</div>
	</div>
</div>
<!-- Modal -->
@endsection