@extends('layouts.home')

@section('hero-header')
<header>
    <div class="row">
        <div class="col-md-12">
            <div class="ai-header">
                <div class="col-md-5 col-pad-reset">
                    <div class="ai-header-logo">
                        <img src="{{asset('images/defaults/ai-logo.png')}}" class="ai-logo" />
                    </div>
                </div>
                <div class="col-md-7 col-pad-reset">
                    <div class="ai-header-name">
                        <h2 class="ai-title">Androidizay</h2>
                        <h3 class="ai-slogan">Sharing Unique Ideas and Innovation</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('mainhome')
<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <div class="col-md-9 col-pad-reset">
                <div class="main-cont">
                maindsadasdad
                </div>
            </div>
            <div class="col-md-3 col-pad-reset">
                <div class="main-sidebar">
                sidebar
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
<script>
    var mn = $(".main-nav");
        mns = "main-nav-scrolled";
        hdr = $('header').height();
    $(window).scroll(function() {
        if( $(this).scrollTop() > hdr ) {
            mn.addClass(mns);
        } else {
            mn.removeClass(mns);
        }
    });
</script>
@endsection