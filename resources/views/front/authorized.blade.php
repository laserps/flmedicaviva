@extends('front.layout')

@section('title') @endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}{
<!-- Header Section --> 
    <section class="section" id="author">
        <div class="container">
            <div class="row center-content">
                <div class="page-header">
                    <h4>ตัวแทนจำหน่าย</h4>
                </div>
                @if(isset($Agents))
                    @foreach($Agents as $key => $agent)
                    {{-- {{$key+1}} --}}
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="{{asset('front/viva/images/dealer01.png')}}" class="img-circle" alt="{{$agent->agent_firstname." ".$agent->agent_lastname}}">
                            <div class="caption">
                            <h4>{{$key+1}}.{{$agent->agent_firstname." ".$agent->agent_lastname}}</h4>
                            
                            <a href="{{ isset($agent->agent_line_id) ? ('http://line.me/ti/p/'.$agent->agent_line_id) : '' }}">
                                <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                            </a>

                            <p>{{$agent->address}}</p>

                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <center>ไม่มีข้อมูล</center>
                @endif
            </div>
        </div>
    </section>  
{{-- end content --}}
@endsection

@section('js')
@endsection