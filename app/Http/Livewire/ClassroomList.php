<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\User;
use Livewire\Component;

class ClassroomList extends Component
{
    public function render()
    {
        $dataClassroom = [];
        $user = auth()->user(); // Lấy thông tin của user đang đăng nhập
        $classroomIds = $user->classrooms()->pluck('id')->all();

        for ($i = 0 ; $i < count($classroomIds) ; $i++) {
            $dataClassroom[$i] = Classroom::find($classroomIds[$i]);
        }

        return view('livewire.classroom-list',[
            'classrooms' => $dataClassroom,
        ])->extends('layouts.frontend');
    }
}
