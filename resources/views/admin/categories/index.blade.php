@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    {{-- card header --}}
                    <div class="card-header card-header-border-bottom">
                        <h2>Categories</h2>
                    </div>

                    {{-- session sukses --}}
                    @include('admin.partials.flash')

                    {{-- card body --}}
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->parent ? $category->parent->name : ''}}</td>
                                        <td>
                                            {{-- edit --}}
                                            <a  href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-success"
                                            >Edit</a>
                                            {{-- hapus --}}
                                            {!! Form::open(['url' => ['admin/categories/'. $category->id], 'class' => 'delete', 'style' => 'display: inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger'] ) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <td class="text-center" colspan="5"> No records found </td>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>

                    {{-- card footer --}}
                    <div class="card-footer text-right">
                        <a  href="{{ route('categories.create') }}"
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