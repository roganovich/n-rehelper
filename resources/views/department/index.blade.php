@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            @csrf
            <table class="table table-bordered" id="departmens-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Проект</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    <tr>
                            <th><input type="text" class="form-control form-search" name="Department[login]" value="{{ old('"Department[login]') }}"></th>
                            <th><input type="text" class="form-control form-search" name="Department[projectTitle]" value="{{ old('"Department[projectTitle]') }}"></th>
                            <th><input type="text" class="form-control form-search" name="Department[title]" value="{{ old('"Department[title]') }}"></th>
                            <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paginations as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->projectTitle}}</td>
                            <td>{{$item->title}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @if($paginations->total() > $paginations->count())
            <div class="container">
                <div class="row justify-content-center">
                    {{$paginations->links()}}
                </div>
            </div>
        @endif
    </div>
</div>

<script type="text/javascript">
    $('.form-search').focusout(function() {
        var result = {};
        $('.form-search').each(function () {
            var field =  $(this);
            result[field.attr('name')] = field.val();

        });
        result['_token'] = $('input[name ="_token"]').val();

        $.ajax({
            type: "POST",
            url: "{{route('department.index')}}",
            data: result,
            success: function(answer){
                console.log(answer);
            }
        });
        console.log(result);
    });
</script>

@endsection


