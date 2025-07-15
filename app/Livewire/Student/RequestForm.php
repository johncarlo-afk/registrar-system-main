<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\DocumentRequest;
use Illuminate\Support\Facades\Auth;

class RequestForm extends Component
{
    public $name, $student_number, $course, $section, $document_type;

    public function submit()
    {
        $this->validate([
            'document_type' => 'required|in:COE,COG,COR',
        ]);

        DocumentRequest::create([
            'user_id' => Auth::id(),
            'document_type' => $this->document_type,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Request submitted successfully!');
        $this->reset('document_type');
    }

    public function render()
    {
        return view('livewire.student.request-form');
    }
}
