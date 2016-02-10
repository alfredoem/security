@extends('common.ragnarok')
@section('content')

    <div class="container">
        <h2>Ragnarok Application Registered <a href="{{url('auth/logout')}}"><i class="glyphicon glyphicon-log-out text-danger"></i></a></h2> 
        <div class="row">
            <!-- Centered Tabs -->
            <ul class="nav nav-pills nav-justified">

                @foreach($data as $row)
                    <li>
                        <a href="{{$row->url}}?userId={{auth()->user()->userId}}">
                            <p>{{$row->name}}</p>
                            <img src="images/{{$row->logo}}" alt="" style="width:150px;"/>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        
    </div>
@endsection