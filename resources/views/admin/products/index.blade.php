@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    {{-- card header --}}
                    <div class="card-header card-header-border-bottom">
                        <h2>products</h2>
                    </div>

                    {{-- session sukses --}}
                    @include('admin.partials.flash')

                    {{-- card body --}}
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>
                                            {{-- edit --}}
                                            <a  href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-success"
                                            >Edit</a>
                                            {{-- hapus --}}
                                            {!! Form::open(['url' => ['admin/products/'. $product->id], 'class' => 'delete', 'style' => 'display: inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger'] ) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <td class="text-center" colspan="6"> No records found </td>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>

                    {{-- card footer --}}
                    <div class="card-footer text-right">
                        <a  href="{{ route('products.create') }}"
                            class="btn btn-primary"
                        >
                            Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection