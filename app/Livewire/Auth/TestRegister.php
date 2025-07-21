<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class TestRegister extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function testSubmit()
    {
        // Simple test method
        session()->flash('message', 'Form submitted successfully! CSRF is working.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.auth.test-register');
    }
}
