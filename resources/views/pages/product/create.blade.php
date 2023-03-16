@extends('layouts.home')

@section('style')
    <link href=" {{ asset('admin/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('select2')
    <script src="{{ asset('admin/vendors/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Product</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="demo-form2" method="post" action="{{ route('product.store') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">Name
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control col-7" name="name" id="name"
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align" for="price">Price
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" class="form-control col-7" name="price" id="price"
                                       value="{{ old('price') }}" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align" for="stock">Stock
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" class="form-control col-7" name="stock" id="stock"
                                    value="{{ old('stock') }}" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align" for="description">Description
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control col-7" name="description" id="description"
                                          value="{{ old('description') }}" required></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-4">
                                <button type="reset" class="btn btn-warning"><i class="fa fa-undo">
                                        Reset</i></button>
                                <button type="submit" class="btn btn-info"><i class="fa fa-plus-square">
                                        Tambah</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
