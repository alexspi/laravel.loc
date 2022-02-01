@extends('layouts.main')
@push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Edit Post

                            <a href="{{ url('admin/posts') }}" class="btn btn-default pull-right">Go Back</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        {!! Form::model($post, ['method' => 'POST', 'route' => ['post.update'], 'class' => 'form-horizontal', 'role' => 'form']) !!}
                            <input type="hidden" name="id" value="{{$post->id}}">
                            @include('posts._form')

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>
{{--    <script>--}}
{{--        $(document).ready(function() {--}}

{{--            var tags = @json($tags)--}}
{{--                console.log( tags);--}}
{{--            $('.select2-tags').select2({--}}
{{--                data:tags--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush