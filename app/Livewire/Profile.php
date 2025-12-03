<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{
    # added for info
    public $name;
    public $email;

    # adding two functions mount and updateProfile
    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updateProfile()
    {
        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
