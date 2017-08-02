@extends('main')

@section('nav')
    @include('navigation.navbar')
@stop

@section('content')
    <div class="container">
        <div class="profile-cotainer">
            <div class="con">
                <img src="https://organicthemes.com/demo/profile/files/2012/12/profile_img.png" class="profile-img">
                 @php ($isAuth = Auth::user()->id == $data['id'])
                    @if($isAuth)
                        <div class="edit_profile">
                            <button data-toggle="modal" data-target="#edit-modal" data-yourparameter={{ Auth::user()->id }}><img src="https://image.flaticon.com/icons/svg/61/61456.svg"></button>
                            {{--<button data-target="#edit-modal" id="ymp" data-yourparameter={{ Auth::user()->id }}><img src="https://image.flaticon.com/icons/svg/61/61456.svg"></button>--}}
                        </div>
                    @endif
            </div>
            <h2 class="author-name">{{$data['username']}}</h2>

            <p id="user-summary">{{$data['description']['description']}}</p>
            <div class="row">
                <button class="show-skills">Įgūdžiai</button>
                @if(!$isAuth)
                    <button class="write-comment" data-toggle="modal" data-target="#write_comment_modal" data-yourparameter={{ $data['id'] }}>Rašyti komentarą</button>
                @endif
            </div>

            <div id="skills" style="display: none;">
                @foreach($data['skills'] as $k => $skill)
                    <div class="skillbar clearfix " data-percent="{{$skill->knowledge_level}}%">
                        @if ($k % 2 == 0)
                            <div class="skillbar-title" style="background: #69a826;"><span>{{$skill->skill_title}}</span></div>
                            <div class="skillbar-bar" style="background: #69a826;"></div>
                        @else
                            <div class="skillbar-title" style="background: #00a8ff;"><span>{{$skill->skill_title}}</span></div>
                            <div class="skillbar-bar" style="background: #00a8ff;"></div>
                        @endif
                        <div class="skill-bar-percent">{{$skill->knowledge_level}}%</div>
                    </div>
                @endforeach
                <!---  CSS --->
                {{--<div class="skillbar clearfix " data-percent="85%">--}}
                    {{--<div class="skillbar-title" style="background: #00a8ff;"><span>CSS</span></div>--}}
                    {{--<div class="skillbar-bar" style="background: #00a8ff;"></div>--}}
                    {{--<div class="skill-bar-percent">85%</div>--}}
                {{--</div>--}}

                {{--<div class="skillbar clearfix " data-percent="65%">--}}
                    {{--<div class="skillbar-title" style="background: #69a826;"><span>HTML5</span></div>--}}
                    {{--<div class="skillbar-bar" style="background: #69a826;"></div>--}}
                    {{--<div class="skill-bar-percent">65%</div>--}}
                {{--</div>--}}
                <!---  CSS --->
            </div>

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1" >
                    <ul class="media-list">
                        @foreach($data['comments'] as $item)
                            <li class="media">
                                <div class="media-body">
                                    @if($item->ranking > 0)
                                        <div class="well well-lg">
                                            <div class="row">
                                                <div class="col-xs-1 spec">
                                                    <img src="http://www.clker.com/cliparts/2/f/6/1/11949856271997454136tasto_2_architetto_franc_01.svg.med.png" class="comment-icon">
                                                </div>
                                                <div class="col-xs-1">
                                                    <h4 class="media-heading text-uppercase reviews">{{$item->written_user_id}}</h4>
                                                </div>
                                            </div>

                                            <p class="media-date text-uppercase reviews list-inline">{{$item->created_at}}</p>
                                            <p class="media-comment">
                                                {{$item->comment}}
                                            </p>
                                        </div>
                                    @else
                                        <div class="alert-danger well-lg">
                                            <div class="row">
                                                <div class="col-xs-1 spec">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Ambox_emblem_minus.svg/600px-Ambox_emblem_minus.svg.png" class="comment-icon">
                                                </div>
                                                <div class="col-xs-1">
                                                    <h4 class="media-heading text-uppercase reviews">{{$item->written_user_id}}</h4>
                                                </div>
                                            </div>

                                            <p class="media-date text-uppercase reviews list-inline">{{$item->created_at}}</p>
                                            <p class="media-comment">
                                                {{$item->comment}}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{ $data['comments']->links() }}
            </div>
        </div>
        @if($isAuth)
            @include('edit_profile_modal')
        @else
            @include('write_comment_modal')
        @endif


    </div>
@endsection