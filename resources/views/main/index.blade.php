
@extends('index')
@section('title', 'Answers on questions')

@section('content')

        <h1 class="text-center my-4">Ответы на вопросы</h1>        

        <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach($questions as $item)
            <div class="accordion-item">
            <h2 class="accordion-header" id="c{{$item->id}}">
                <button style="padding-top:{{$item->padding_top}}px; padding-bottom:{{$item->padding_bottom}}px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s{{$item->id}}" aria-expanded="false" aria-controls="{{$item->id}}">
                {{$item->question}}
                </button>
            </h2>
            <div id="s{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="c{{$item->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body" style="padding-top:{{$item->padding_top}}px; padding-bottom:{{$item->padding_bottom}}px" >{{$item->answer}}</div>
            </div>
            </div>
            @endforeach  
            
        </div>
@endsection