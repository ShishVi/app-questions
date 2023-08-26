@extends('index')

@section('title', 'Новый вопрос')

@section('content')

<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Новый вопрос</h2>
    
</div>

<form action="{{route('admin.store-question')}}" method="POST" >
    @csrf
    <div class="mb-3">
        <label for="question" class="form-label">Вопрос</label>
        <input type="text" class="form-control" id="question" name="question" value="{{old('question')}}">
        @error('question')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="answer" class="form-label">Ответ</label>
        <textarea class="form-control" id="answer" name="answer" rows="3">{{old('answer')}}</textarea>
        @error('answer')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <button type="submit" class="btn btn-info">Создать</button>
    
</form>

@endsection