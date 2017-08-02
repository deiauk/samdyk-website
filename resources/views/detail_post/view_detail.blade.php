@extends('main')

@section('nav')
    @include('navigation.navbar')
@stop

@section('content')
    <div class="container">
        @if(!empty($post))
            <div class="post-container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="author-info">
                            <h3 class="author-name">{{$post->user_name}}</h3>
                            <img class="author-img" src="https://camo.mybb.com/e01de90be6012adc1b1701dba899491a9348ae79/687474703a2f2f7777772e6a71756572797363726970742e6e65742f696d616765732f53696d706c6573742d526573706f6e736976652d6a51756572792d496d6167652d4c69676874626f782d506c7567696e2d73696d706c652d6c69676874626f782e6a7067">
                            <p class="author-rep"><strong>Reputacija:</strong> + 5</p>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="content-container">
                            <h2><strong>{{$post->title}}</strong></h2>
                            <hr class="custom-hr">
                            <p>{{$post->body}}</p>
                        </div>
                    </div>
                    @if(!\Illuminate\Support\Facades\Auth::guest() && \Illuminate\Support\Facades\Auth::user()->id != $post->user_id)
                        <button class="my-btn">Rezervuoti</button>
                    @endif

                    <button class="fb-share-btn">Dalintis Facebooke</button>
                </div>

                {{--<div class="col-xs-1 take-it">--}}
                    {{--<p id="fgf">Laisva</p>--}}
                {{--</div>--}}
            </div>
        @endif
    </div>
@stop