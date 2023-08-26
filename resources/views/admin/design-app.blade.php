@extends('index')

@section('title', 'Дизайн')

@section('content')

<div class="row">
    <div class="col-sm-12 col-xl-6 mt-5">
       
        <h4 class="text-center mb-4">Отступ сверху</h4>
        <div class="d-flex justify-content-evenly ">
            <form action="{{route('admin.changePaddingTop', 25)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_top == 25) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">25 px</button>
            </form>
            <form action="{{route('admin.changePaddingTop', 36)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_top == 36) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">36 px</button>
            </form>
            <form action="{{route('admin.changePaddingTop', 40)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_top == 40) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">40 px</button>
            </form>
            <form action="{{route('admin.changePaddingTop', 55)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_top == 55) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">55 px</button>
            </form>
        </div>
    </div>
    <div class="col-sm-12 col-xl-6 mt-5">
        <h4 class="text-center mb-4">Отступ снизу</h4>
        <div class="d-flex justify-content-evenly ">
            <form action="{{route('admin.changePaddingBottom', 25)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_bottom == 25) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">25 px</button>
            </form>
            <form action="{{route('admin.changePaddingBottom', 36)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_bottom == 36) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">36 px</button>
            </form>
            <form action="{{route('admin.changePaddingBottom', 40)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_bottom == 40) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">40 px</button>
            </form>
            <form action="{{route('admin.changePaddingBottom', 55)}}" action="GET">
                @csrf
                <button type="submit" @if($question->padding_bottom == 55) class="btn btn-primary btn-sm" @endif class="btn btn-outline-primary btn-sm">55 px</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 ">
        <h5 class="text-center mt-4">Образец дизайна</h5>

        <div class="accordion accordion-flush" id="accordionFlushExample">            
            <div class="accordion-item">
            <h2 class="accordion-header" id="c{{$question->id}}">
                <button style="padding-top:{{$question->padding_top}}px; padding-bottom:{{$question->padding_bottom}}px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s{{$question->id}}" aria-expanded="false" aria-controls="{{$question->id}}">
                {{$question->question}}
                </button>
            </h2>
            <div id="s{{$question->id}}" class="accordion-collapse collapse" aria-labelledby="c{{$question->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body" style="padding-top:{{$question->padding_top}}px; padding-bottom:{{$question->padding_bottom}}px" >{{$question->answer}}</div>
            </div>
            </div>           
        </div>

    </div>
</div>

@endsection