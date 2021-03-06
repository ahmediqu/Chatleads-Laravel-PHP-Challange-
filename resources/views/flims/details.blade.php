@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
	<div class="row justify-content-center">
		
		<div class="col-md-4">
			<div class="card">
				<img src="{{$flims->photo}}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">{{$flims->name}}</h5>
					<p class="card-text font-weight-bold">Release : {{$flims->release}}</p>
					<p class="card-text">Description : {{$flims->description}}</p>
					<p class="card-text">Price : {{$flims->price}} Tk</p>
					<a href="#" class="btn btn-primary d-block">Get Ticket</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				
				<div class="card-body">
					<form action="{{url('comment')}}"  method="post">
						@csrf
						<input type="hidden" name="flims_id" value="{{$flims->id}}">
						<h5 class="card-title">Comments</h5>
						<div class="form-group">
							<textarea name="comment" id="" cols="30" rows="4" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info font-weight-bold">Comment</button>
						</div>
					</form>
				</div>
			</div>

			<div class="card  mt-3">
				<div class="card-body">
					@foreach($commnets as $comment)
					<div class="all-comment mt-3 mb-3">
						<div class="media border-1">
							<img src="https://img.pngio.com/user-logos-user-logo-png-1920_1280.png" class="mr-3" alt="..." style="height: 64px;">
							<div class="media-body">
								<h5 class="mt-0">{{$comment->userName}}</h5>
								{{$comment->comment}}
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		
		
	</div>
</div>
@endsection