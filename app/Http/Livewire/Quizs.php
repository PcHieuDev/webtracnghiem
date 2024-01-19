<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use Carbon\Traits\Date;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Answer;
use Carbon\Carbon;

class Quizs extends Component
{
    use WithPagination;
     use AuthorizesRequests;

     protected $listeners = [
        'confirmed',
        'cancelled',
        'bulkDelete'
    ];

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord,$deleteId,$checkedAll, $quiz_name, $per_question_mark, $classroom_id;
    public $checked = [];
    public $expired_quiz;
    public $start_quiz;
    public $quiz_time = 1;
    public $perPage = 10;
    public $classrooms = [];
    public $countStudent;




    public function render()
    {
        $this->authorize('quiz-list');



        $this->classrooms = Classroom::all();

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.quizzes.index', [
            'quizzes' => Quiz::latest()
						->orWhere('quiz_name', 'LIKE', $keyWord)
						->orWhere('per_question_mark', 'LIKE', $keyWord)
						->orWhere('classroom_id', 'LIKE', $keyWord)
						->paginate($this->perPage),


        ])->extends('layouts.app');
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetInput()
    {
		$this->quiz_name = null;
		$this->per_question_mark = null;
        $this->quiz_time = 1;
		$this->classroom_id = null;
        $this->start_quiz = null;
        $this->expired_quiz = null;
    }

    public function store()
    {
//        $expired_quiz = Carbon::createFromFormat('d-m-Y', $this->expired_quiz)->format('Y-m-d');

        $this->authorize('quiz-create');

        $this->validate([
		'quiz_name' => 'required',
		'per_question_mark' => 'required',
		'classroom_id' => 'required',
        ]);


        Quiz::create([
			'quiz_name' => $this-> quiz_name,
			'per_question_mark' => $this-> per_question_mark,
			'classroom_id' => $this-> classroom_id,
            'quiz_time' => $this->quiz_time,
            'start_quiz' => $this->start_quiz,
            'expired_quiz' => $this -> expired_quiz,
        ]);

        $this->resetInput();
		$this->emit('closeModal');
/*		$this->alert('success', 'Quiz Successfully created.');*/
    }

    public function edit($id)
    {
        $this->resetInput();
        $record = Quiz::findOrFail($id);
        $this->selected_id = $id;
		$this->quiz_name = $record-> quiz_name;
		$this->per_question_mark = $record-> per_question_mark;
		$this->classroom_id = $record-> classroom_id;
        $this->quiz_time = $record->quiz_time;
        $this->start_quiz = $record->start_quiz;
        $this->expired_quiz = $record->expired_quiz;

//        $this->time = $record-> time;

    }
    public function show($id)
    {

        $record = Quiz::findOrFail($id);

        $this->selected_id = $id;
		$this->quiz_name = $record-> quiz_name;
		$this->per_question_mark = $record-> per_question_mark;
		$this->classroom_id = $record-> classroom_id;
        $this->quiz_time = $record->quiz_time;
//        $this->time = $record-> time;

    }

    public function update()
    {
        $this->authorize('quiz-edit');

        $this->validate([
		'quiz_name' => 'required',
		'per_question_mark' => 'required',
		'classroom_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Quiz::find($this->selected_id);
            $record->update([
			'quiz_name' => $this-> quiz_name,
			'per_question_mark' => $this-> per_question_mark,
			'classroom_id' => $this-> classroom_id,
            'quiz_time' => $this->quiz_time,
            'start_quiz' => $this->start_quiz,
            'expired_quiz' => $this->expired_quiz,
//            'time' => $this-> time
            ]);

            $this->resetInput();

        }
    }

     public function triggerConfirm($id)
    {
        $this->deleteId = $id;

        $this->destroy();
    }

    public function confirmed()
    {
        $this->destroy();

    }

    public function cancelled()
    {
        $this->deleteId = null;
    }

    public function destroy()
    {
        $this->authorize('quiz-delete');

        if ($this->deleteId) {
            $record = Quiz::where('id', $this->deleteId);
            $record->delete();
        }
    }

    public function bulkDeleteTriggerConfirm()
    {

        $this->bulkDelete();
    }

    public function bulkDelete()
    {
        $this->authorize('quiz-delete');

        Quiz::whereKey($this->checked)->delete();
        $this->checked = [];

    }

    public function updatedCheckedAll($value)
    {
        if ($value) {
            $this->checked = Quiz::pluck('id');
        }else{
            $this->checked = [];
        }
    }


}
