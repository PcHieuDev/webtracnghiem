<?php

namespace App\Http\Livewire;


use App\Models\ClassroomStudent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public $classroom_id;

    public function render()
    {
        return view('livewire.home')->extends('layouts.frontend');
    }


//    public function store()
//    {
//        if (!auth()->check()) {
//            return redirect()->route('login');
//        }
//        $user = auth()->user();
//        if ($user->hasRole('teacher') || $user->hasRole('admin')) {
//            return redirect()->back()->with('error', 'Bạn không phải học sinh nên không được tham gia lớp học.');
//            /*return redirect()->route('dashboard');*/
//        }
//        $this->validate([
//            'classroom_id' => 'required',
//        ]);
//
//        $classroom = DB::table('classrooms')->where('classroom_unique_id', $this->classroom_id)->first();
//
//        // Kiểm tra xem lớp học có tồn tại không
//        if (!$classroom) {
//            // Nếu không tìm thấy lớp học, chuyển hướng với thông báo
//            return redirect()->back()->with('error', 'ID không tồn tại.');
//        }
//        if (ClassroomStudent::where('user_id', auth()->user()->id)->where('classroom_id', $this->classroom_id)->count()) {
//            return redirect()->route('classroom.show', $classroom->id);
//        }
//        ClassroomStudent::insert([
//            'classroom_id' => $classroom->id,
//            'user_id' => auth()->user()->id,
//
//        ]);
//        return redirect()->route('classroom.show', $classroom->id);
//    }
    public function store()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        if ($user->hasRole('teacher') || $user->hasRole('admin')) {
            return redirect()->back()->with('error', 'Bạn không phải học sinh nên không được tham gia lớp học.');
        }

        $this->validate([
            'classroom_id' => 'required',
        ]);

        $classroom = DB::table('classrooms')->where('classroom_unique_id', $this->classroom_id)->first();

        if (!$classroom) {
            return redirect()->back()->with('error', 'ID không tồn tại.');
        }

        $isStudentInClass = ClassroomStudent::where('user_id', auth()->user()->id)
            ->where('classroom_id', $classroom->id)
            ->exists();
        // Kiểm tra xem học sinh đã tham gia lớp học chưa

        if ($isStudentInClass) {
            return redirect()->route('classroom.show', $classroom->id);
        }
        ClassroomStudent::insert([
            'classroom_id' => $classroom->id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('classroom.show', $classroom->id);
    }
}
