@extends('dashboard.layouts.app')
@section('pageTitle' , __('dashboard.update_title', ['page_title' => __('dashboard.note')]))
@section('content')


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">@lang('dashboard.update_title', ['page_title' => __('dashboard.note')])</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('home')}}" class="text-muted text-hover-primary">@lang('dashboard.home')</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('notes.index')}}" class="text-muted text-hover-primary">notes</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">@lang('dashboard.update', ['page_title' => __('dashboard.note')])</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
      
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Form-->
                <form id="kt_ecommerce_add_product_form" action="{{ route('notes.update', $note->id) }}" method="POST"
                    class="form d-flex flex-column flex-lg-row store" data-kt-redirect="{{route('notes.index')}}" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                          
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 " data-bs-toggle="tab"
                                    href="#kt_ecommerce_add_product_en">@lang('dashboard.EN')</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                    
                            <div class="tab-pane fade  show active" id="kt_ecommerce_add_product_en" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Inventory-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>البيانات باللغه الانجليزية</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->

                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">@lang('dashboard.customer')</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                    <select name="user_id" required aria-label="Select a Customer" data-control="select2" data-placeholder="{{$note->Users->name}}" 
                                                    class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible" data-select2-id="select2-data-10-05ls" tabindex="-1" aria-hidden="true">
                                                        <option value="{{$note->Users->id}}" data-select2-id="select2-data-12-wa4o" selected >{{$note->Users->name}}</option>
                                                        @foreach ($users as $user)
                                                          @if($note->Users->id != $user->id )
                                                            <option value="{{$user->id}}">
                                                            {{$user->name}}
                                                            </option>
                                                          @endif  
                                                        @endforeach
                                                    </select>
                                            
                                                </div>
                                              <!--end::Col-->
                                        
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="required form-label">@lang('dashboard.note')</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea id="kt_ecommerce_add_product_description_ar" name="note" class="form-control form-control-solid"
                                                    style="height: 249px;">{{ $note->note }}</textarea>
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">@lang('dashboard.note_desc' ,['page_title' => __('dashboard.notes')])</div>

                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                  
                                    <!--end::Inventory-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('notes.index') }}" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@section('scripts')
@endsection

@endsection
