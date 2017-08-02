@extends('main')

@section('nav')
    @include('navigation.navbar')
@stop

@section('content')
    <div class="container">
        <h2>Sistemoje registruoti vartotojai</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Slapyvardis</th>
                    <th>Kategorija</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    @if($item->authenticate_user == true)
                        <tr class="success">
                            @if(Auth::user()->id == $item->id)
                                <td><a href="rodyti_mano_profili" {{$item->id}}>{{$item->email}}</a></td>
                            @else
                                <td><a href="vartotojo_profilis/{{$item->id}}" {{$item->id}}>{{$item->email}}</a></td>
                            @endif
                            <td>Patvirtinti nariai</td>
                        </tr>
                    @else
                        <tr class="danger">
                            @if(Auth::user()->id == $item->id)
                                <td><a href="rodyti_mano_profili" {{$item->id}}>{{$item->email}}</a></td>
                            @else
                                <td><a href="{{ route('user:profile', $item->id) }}" {{$item->id}}>{{$item->email}}</a></td>
                            @endif
                            <td>Nepatvirtinti nariai</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
