@extends('vendor/metronic/layouts/master')

@section('title')
    {!! __('controlpanel.app_title_prefix') . ucfirst(request()->route('name')) . __('controlpanel.category.name') . __('controlpanel.category.view.list')!!}
@endsection

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    {!! renderSubHead([__('controlpanel.category.name'), __('controlpanel.category.view.index')]) !!}
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            {!! renderTableHead(__('controlpanel.new_record'), route('categoryNew','program')) !!}
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __('controlpanel.category.column.thumb.name') }}</th>
                            <th>{{ __('controlpanel.category.column.name.name') }}</th>
                            <th>{{ __('controlpanel.category.column.slug.name') }}</th>
                            <th>{{ __('controlpanel.category.column.description.name') }}</th>
                            <th>{{ __('controlpanel.category.column.count.name') }}</th>
                            <th>{{ __('controlpanel.category.column.action.name') }}</th>
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
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/metronic/assets/vendors/custom/datatables/datatables.bundle.css') }}">
@endpush
@push('js')
    <script src="{{ asset('vendor/metronic/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic/assets/demo/default/custom/components/base/toastr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/category/index.js') }}" type="text/javascript"></script>
@endpush
