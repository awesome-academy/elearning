@extends('vendor/metronic/layouts/master')

@section('title')
    {!! __('controlpanel.app_title_prefix') . ucfirst(request()->route('name')) . __('controlpanel.category.name') . __('controlpanel.category.view.edit')!!}
@endsection

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    {!! renderSubHead([ucfirst(request()->route('name')), __('controlpanel.category.name'), __('controlpanel.category.view.edit')]) !!}

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-lg-9">
                <div class="fl-ms"></div>
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    {{ __('controlpanel.category.name') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['class' => 'm-form']) !!}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-11">
                                    {!! Form::label('name', __('controlpanel.category.column.name.name') . ':') !!}
                                    {!! Form::text('name', $node['name'], ['class' => 'form-control m-input']) !!}
                                </div>
                                <div class="col-lg-1">
                                    <label><br></label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <span>( * )</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-11">
                                    {!! Form::label('slug', __('controlpanel.category.column.slug.name') . ':') !!}
                                    {!! Form::text('slug', $node['slug'], ['class' => 'form-control m-input']) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-11">
                                    {!! Form::label('parent_id', __('controlpanel.category.column.parent_id.name') . ':') !!}
                                    {!! Form::select('parent_id', [], null, ['class' => 'form-control m-bootstrap-select m_selectpicker']) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-11">
                                    {!! Form::label('description', __('controlpanel.category.column.description.name') . ':') !!}
                                    <div class="m-input-icon m-input-icon--right">
                                        {!! Form::text('description', $node['description'], ['class' => 'form-control m-input']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    {!! Form::label('filepath', __('controlpanel.category.column.thumb.name') . ':') !!}
                                    <div class="m-input-icon m-input-icon--right">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> {{ __('controlpanel.choose_button') }}
                                                </a>
                                            </span>
                                            {!! Form::text('filepath', $node['image']['url'], ['class' => 'form-control', 'id' => 'thumbnail']) !!}
                                        </div>
                                        <img id="holder"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-lg-11 m--align-right">
                                        {!! Form::submit(__('controlpanel.submit_button'), ['class' => 'btn btn-primary', 'id' => 'category_edit']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>
</div>
@stop


@push('css')
@endpush
@push('js')
    <script src="{{ asset('vendor/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('vendor/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script src="{{ asset('js/admin/string_helper.js') }}"></script>
    <script src="{{ asset('js/admin/category/edit.js') }}"></script>
    <script type="text/javascript">
        var parent_id = {!! $node['parent_id'] !!};
    </script>
@endpush
