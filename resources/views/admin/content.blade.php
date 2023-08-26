@extends('index')

@section('title', 'Контент')

@section('content')

<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Контент</h2>
    <a href="{{route('admin.create-question')}}" class="btn btn-primary">Добавить</a>
</div>
@if(session('successUpdateQuestion'))

<div class="alert alert-success">
    {{ session('successUpdateQuestion') }}
</div>
    
@endif

<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Номер вопроса</td>
                <td>Вопрос</td>
                <td>Ответ</td>
                <td>Действие</td>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $item)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->question}}</td>
                <td>{{$item->answer}}</td>
                <td >
                    
                    <a href="{{route('admin.edit-question', $item->id)}}" class="btn btn-sm btn-warning my-3">Ред.</a>
                    <form action="{{route('admin.delete-question', $item->id)}}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick='event.preventDefault();
                        if(confirm("Запись будет удалена! Продолжить?")){
                                this.closest("form").submit();
                            }'>Удалить</button>
                    </form>
                    
                </class=>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection