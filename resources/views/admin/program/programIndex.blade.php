@extends('vendor/metronic/layouts/master')

@section('title', 'FELS | Program Index')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	{!! renderSubHead([__('controlpanel.program.name'), __('controlpanel.program.view.list')]) !!}

	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>{!! __('controlpanel.program.name') !!}</span>
								</span>
							</a>
						</li>
						<li class="m-portlet__nav-item"></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
					<thead>
						<tr>
							<th></th>
							<th>{!! __('controlpanel.program.column.name.name') !!}</th>
							<th>{!! __('controlpanel.program.column.slug.name') !!}</th>
							<th>{!! __('controlpanel.program.column.description.name') !!}</th>
							<th>{!! __('controlpanel.program.column.course.name') !!}</th>
							<th>{!! __('controlpanel.program.column.release.name') !!}</th>
							<th>{!! __('controlpanel.program.column.updated_at.name') !!}</th>
							<th>{!! __('controlpanel.program.column.status.name') !!}</th>
							<th>{!! __('controlpanel.program.column.action.name') !!}</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>

		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
@stop


@push('css')
<link rel="stylesheet" type="text/css" href="/vendor/metronic/assets/vendors/custom/datatables/datatables.bundle.css">
@endpush
@push('js')
	<script src="{{ asset('vendor/metronic/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vendor/metronic/assets/demo/default/custom/components/base/toastr.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/admin/program/index.js') }}" type="text/javascript"></script>
@endpush