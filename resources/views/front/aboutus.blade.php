@extends('front.layout')

@section('title') @endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}
    <section class="section" id="howtobuy">
        <div class="container">
          <div class="row center-content">
            <div class="page-header">
              <h4>เกี่ยวกับเรา</h4>
            </div>
            <div class="about-content">
                <center>
                    <img src="{{asset('front/viva/images/about us.jpg')}}" class="img-responsive">
                    <img src="{{asset('front/viva/images/5q.jpg')}}" class="img-responsive">
                </center>
            </div>
          </div>
        </div>
    </section>    
{{-- end content --}}
@endsection

@section('js')
@endsection