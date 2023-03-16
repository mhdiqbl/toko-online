@extends('layouts.home')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Tansaksi</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30"></p>
                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Product</th>
                                            <th>Nama Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Payment Amount</th>
                                            <th>No Reference</th>
                                            <th>Tgl Transaksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->payment_amount }}</td>
                                                <td>{{ $item->reference_no }}</td>
                                                <td>{{ $item->created_at->format('Y-m-d') }}</td>

                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <form method="post"
                                                            action="{{ route('transaction.destroy', $item->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="btn-group">
                                                                {{-- <a href="{{ route('peralihan.create', $item->id_sertifikat) }}"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        name="edit" title="Peralihan"
                                                                        class="btn btn-warning"><i class="fa fa-send"></i></a> --}}

                                                                <a href="{{ route('transaction.edit', $item->id) }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    name="edit" title="Edit" class="btn btn-info"><i
                                                                        class="fa fa-edit"></i></a>

                                                                <button type="submit"
                                                                    onclick="return confirm('YAKIN INGIN MENGHAPUS DATA?');"
                                                                    name="hapus" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"
                                                                    class="btn btn-danger"><i
                                                                        class="fa fa-trash"></i></button>

                                                                {{-- <button id="delete-sertifikat" name="hapus"
                                                                        data-id="{{ $item->id_sertifikat }}"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete" class="btn btn-danger"><i
                                                                            class="fa fa-trash"></i></button> --}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
