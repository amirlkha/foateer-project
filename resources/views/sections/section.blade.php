@extends('layouts.master')
@section('css')
@section('tittle')
sections
@stop
<!-- Internal Data table css -->


@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاقسام</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
					
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-slide-in-bottom" data-toggle="modal" href="#modaldemo8">اضافة قسم</a>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example2">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم القسم</th>
												<th class="wd-15p border-bottom-0">ملحظات</th>
												<th class="wd-20p border-bottom-0">العمليات</th>
											
											</tr>
										</thead>
										<tbody>
											<?php $i = 0; ?>
											@foreach ($sections as $x)
											<?php $i++; ?>
											<tr>
												<td>{{ $i }}</td>
												<td>{{ $x->section_name }}</td>
												<td>{{ $x->description }}</td>
												<td>
												
														<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
															data-id="{{ $x->id }}" data-section_name="{{ $x->section_name }}"
															data-description="{{ $x->description }}" data-toggle="modal"
															href="#exampleModal2" title="edit"><i class="las la-pen"></i></a>
											
			
														<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
															data-id="{{ $x->id }}" data-section_name="{{ $x->section_name }}"
															data-toggle="modal" href="#modaldemo9" title="delet"><i
																class="las la-trash"></i></a>
												
												</td>
											</tr>
											@endforeach
											
										
											
										</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
				</div>
				<div class="modal" id="modaldemo8">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<form action="{{ route('sections.store') }}" method="post">
									{{ csrf_field() }}
			
									<div class="form-group">
										<label for="exampleInputEmail1">اسم القسم</label>
										<input type="text" class="form-control" id="section_name" name="section_name">
									</div>
			
									<div class="form-group">
										<label for="exampleFormControlTextarea1">ملاحظات</label>
										<textarea class="form-control" id="description" name="description" rows="3"></textarea>
									</div>
			
									<div class="modal-footer">
										<button type="submit" class="btn btn-success">ok</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
		
							<form action="section/update" method="post" autocomplete="off">
								{{ method_field('patch') }}
								{{ csrf_field() }}
								<div class="form-group">
									<input type="hidden" name="id" id="id" value="">
									<label for="recipient-name" class="col-form-label">اسم القسم:</label>
									<input class="form-control" name="section_name" id="section_name" type="text">
								</div>
								<div class="form-group">
									<label for="message-text" class="col-form-label">ملاحظات:</label>
									<textarea class="form-control" id="description" name="description"></textarea>
								</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Done</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal" id="modaldemo9">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
								type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<form action="sections/destroy" method="post">
							{{ method_field('delete') }}
							{{ csrf_field() }}
							<div class="modal-body">
								<p>Are YOU SURE ؟</p><br>
								<input type="hidden" name="id" id="id" value="">
								<input class="form-control" name="section_name" id="section_name" type="text" readonly>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Done</button>
							</div>
					</div>
					</form>
				</div>
			</div>
		
				<!-- row closed -->
				
			</div>
			
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<!-- Internal Data tables -->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #description').val(description);
    })

</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
     
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    
    })

</script>
@endsection