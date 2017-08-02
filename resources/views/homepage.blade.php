@extends('main')

@section('nav')
    @include('navigation.navbar')
@stop

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <a href="#"><p>Internetiniai tinklalapiai</p></a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="button button-plain button-border button-box create-topic" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        @if ($d->post_type === 1)
                            <tr>
                                <td width="80%">
                                   <a href={{route('posts.id.show', ['tag' => 1, 'id' => $d->id])}}><p>{{$d->title}}</p></a>
                                </td>
                                <td width="20%">
                                    <div class="topic-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <strong>Šiandien</strong> {{$d->created_at}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <strong>Parašė:</strong> {{$d->user_name}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                     @endforeach
                </tbody>
            </table>
        </div>


        {{--<div class="panel panel-default">--}}
            {{--<table class="table table-bordered">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th colspan="2">--}}
                        {{--<div class="row">--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<a href="#"><p>Internetiniai tinklalapiai</p></a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<button class="button button-plain button-border button-box create-topic" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($data as $d)--}}
                    {{--@if ($d->post_type === 2)--}}
                        {{--<tr>--}}
                            {{--<td width="80%">--}}
                                {{--<a href={{route('posts.show', ['id' => 7])}}><p>{{$d->title}}</p></a>--}}
                            {{--</td>--}}
                            {{--<td width="20%">--}}
                                {{--<div class="topic-info">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-lg-12">--}}
                                            {{--<strong>Šiandien</strong> {{$d->created_at}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-lg-12">--}}
                                            {{--<strong>Parašė:</strong> {{$d->user_name}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
        @include('modal')


    </div>
@stop