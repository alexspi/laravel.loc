@extends('layouts.main')
@push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endpush
@section('title', 'Новый пост')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Новый пост

                            <a href="{{ route('blog') }}" class="btn btn-default pull-right">Назад</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'post.create', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                            @include('posts._form')

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Создать
                                    </button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select2-tags').select2();
    });
</script>
@endpush
