@extends('admin.layout')

@section('content')

    {{-- cek apakah apakah form create atau update --}}
    @php
        $formTitle = !empty($category) ? 'Update' : 'New'
    @endphp

    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    {{-- card header --}}
                    <div class="card-header card-header-border-bottom">
                        <h2> {{ $formTitle }} category </h2>
                    </div>

                    {{-- card-body --}}
                    <div class="card-body">

                        @include('admin.partials.flash', ['$errors' => $errors])

                        @if (!empty($category))
                            {!! Form::model($category, ['url' => ['admin/categories', $category->id], 'method' => 'PUT']) !!}
                            {!! Form::hidden('id') !!}
                        @else
                            {!! Form::open(['url' => 'admin/categories']) !!}
                        @endif
                            {{-- input name --}}
                            <div class="form-group">
                                {!! Form::label('name', 'Name')!!}
                                {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'category name'])!!}
                            </div>

                            {{-- input categories --}}
                            <div class="form-group">
                                {!! Form::label('parent_id', 'Parent')!!}
                                {!! General::selectMultiLevel(  'parent_id',
                                                                $categories, [  'class' => 'form-control',
                                                                                'selected' => !empty(old('parent_id')) ? old('parent_id') : !empty($category['parent_id']) ? $category['parent_id'] : '',
                                                                                'placeholder' => '-- Choose Category --'
                                                                             ]
                                                             )
                                !!}
                            </div>

                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Save</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection