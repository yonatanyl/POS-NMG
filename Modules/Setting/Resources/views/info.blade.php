@extends('layouts.app')

@section('title', 'Info Aplikasi')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Info Aplikasi</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="text-center" style="font-size: 18px;">
            <div class="container">
                Noval Mutiara Gemilang © {{ date('Y') }} || Credit by <strong><a target="_blank"
                        href="https://github.com/FahimAnzamDip/triangle-pos.git">Fahim Anzam Dip</a></strong>
            </div>
            <div class="container">
                Noval Mutiara Gemilang © {{ date('Y') }} || Developed by <strong><a target="_blank"
                        href="https://github.com/zalzdarkent">Alif Fadillah Ummar</a><span> and</span><a href="https://github.com/yonatanyl" target="_blank"> Yonatan Yusak Lestari</a></strong>
            </div>
        </div>
    </div>
@endsection
