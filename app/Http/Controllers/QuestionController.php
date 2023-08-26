<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(){
        return view('admin.content',[
            'questions' => Question::all(),
        ]);
    }

    public function create(){
        return view('admin.create-question');
    }

    public function store(Request $request){

        $request->validate([
            'question' => 'required|min:2|unique:questions',
            'answer' => 'required|min:3|unique:questions',
        ]);

        $firstQuestion = Question::all()->first(); // находим первый элемент в БД для получения значений отступов элемента.

        


        if($firstQuestion->padding_top != 12) {

            $newQuestion =  Question::create($request->all());
            
            $newQuestion->padding_top = $firstQuestion->padding_top; // перезаписываем значение отступа для нового элемента БД
            $newQuestion->padding_bottom = $firstQuestion->padding_bottom; // перезаписываем значение отступа для нового элемента БД
            $newQuestion->save();
        }     

       


        return redirect()->route('admin.index');
    }

    public function edit($questionId){

        return view('admin.edit-question', [
            'question' => Question::find($questionId),
        ]);
    }

    public function update(Request $request, $questionId){

        $request->validate([
            'question' => 'required|min:2',
            'answer' => 'required|min:3',
        ]);

        $question = Question::find($questionId);
        $question->update($request->all());
        return redirect()->route('admin.index')->with('successUpdateQuestion', 'Вопрос "' . $question->question .  '" успешно обновлен!');
    }

    public function delete($questionId){

        $question = Question::find($questionId);
        $question->delete();
        return back();
    }

    

    


}
