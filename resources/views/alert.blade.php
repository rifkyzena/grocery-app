@extends('layouts.app', ['title' => 'Alert'])
@section('content')
    <div class="container d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center">
            <div class="responsive-circle">
                <div class="inner-circle"></div>
                <div style="display: flex; flex-direction: column; align-items: center;">
                    @if ($text2 == false && $route == false)
                        <p class="text1">{{ $text }}</p>
                    @endif
                    @if ($text2 && $route)
                        <p class="text1" style="top:40% !important">{{ $text }}</p>
                        <p class="text2" style="top:50% !important">We will contact you 1x24 hours.</p>
                        <a href="/home" style="top:60% !important">Click here to "Home"</a>
                    @endif
                    @if ($route && $text2 == false)
                        <p class="text1" style="top:45% !important">{{ $text }}</p>
                        <a href="/home" style="top:55% !important">Click here to "Home"</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
