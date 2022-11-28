@extends('base')
@include('navbar')
@section('main')
<div class="d-flex flex-row justify-content-center align-items-center position-relative"
    style="height: calc(100vh - 1rem)">
    <img src="/img/kazuha.png" class="align-self-end" alt="" height="550">
    <div class="ms-5">
        <small>Hello, My Name is</small>
        <h1 class="m-0">Muhamad Ardalepa</h1>
    </div>
    <a href="#next" class="position-absolute text-center w-100" style="bottom: 0;height: 3rem;">See More</a>
</div>
<span id="next"></span>
<div class="py-5 vh-100">
    <div class="pt-5 d-flex flex-row justify-content-center align-items-center h-100 gap-5">

        <div class="">
            <p>You can call me Arda, Lepa or anything you want. I was born in Sintang on July
                23<sup>rd</sup>
                2002.
            </p>
            <p>
                I am currently studying as a fifth semester student at the electrical engineering department,
                Informatics
                Engineering study program at Pontianak State Polytechnic.
            </p>

            <p>
                I love photography. Usually, I spend my time after work to take a picture with my camera. Besides that,
                I
                also like anime, manga and games.
            </p>
        </div>
        <div class="shadow-sm rounded-sm h-100 w-100 p-5">
            <h3>Contact me</h3>
            <div class="d-flex"></div>
        </div>
    </div>
</div>
@endsection