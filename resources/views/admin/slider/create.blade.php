@extends('admin.layouts.master')

@section('content')

	<section class="section">
		<div class="section-header">
			<h1>Slider</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Create slider</h4>
						</div>
						<div class="card-body">
							<form method="POST" action="{{route('admin.slider.store')}}" ENCTYPE="multipart/form-data">
								@csrf
								<div class="form-group">
									<label for="banner">Banner</label>
									<input id="banner" type="file"  class="form-control" name="banner">
								</div>
								<div class="form-group">
									<label for="type">Type</label>
									<input id="type" type="text"  class="form-control" name="type" value="{{old('type')}}">
								</div>
								<div class="form-group">
									<label for="title">Title</label>
									<input id="title" type="text"  class="form-control" name="title" value="{{old('title')}}">
								</div>
								<div class="form-group">
									<label for="price">Starting price</label>
									<input id="price" type="text"  class="form-control" name="starting_price" value="{{old('starting_price')}}">
								</div>
								<div class="form-group">
									<label for="url">Button URL</label>
									<input id="url" type="text"  class="form-control" name="btn_url" value="{{old('btn_url')}}">
								</div>
								<div class="form-group">
									<label for="serial">SerialL</label>
									<input id="serial" type="number"  class="form-control" name="serial" value="{{old('serial')}}">
								</div>
								<div class="form-group">
									<label for="state">Status</label>
									<select id="state" class="form-control" name="status" >
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>
								<button type='submit' class="btn btn-primary">Create</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection