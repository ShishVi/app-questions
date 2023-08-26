@extends('index')

@section('title', $question->question. 'Ред.')

@section('content')

<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Ред. вопроса: {{$question->question}} </h2>
    
</div>

<form action="{{route('admin.update-question', $question->id)}}" method="POST" >
    @csrf @method('PUT')
    <div class="mb-3">
        <label for="question" class="form-label">Вопрос</label>
        <input type="text" class="form-control" id="question" name="question" value='{{old('question', $question->question)}}'>
        @error('question')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="answer" class="form-label">Ответ</label>
        <textarea class="form-control" id="answer" name="answer" rows="3"> {{old('answer', $question->answer)}}</textarea>
        @error('answer')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <button type="submit" class="btn btn-info">Сохранить</button>
    
</form>

@endsection