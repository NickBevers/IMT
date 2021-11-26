<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use Livewire\Component;

class RemoveImage extends Component
{
    public function render()
    {
        return view('livewire.remove-image');
    }

    public function removeProfilePicture()
    {
        $userController = new UserController;
        $userController->removeProfilePicture();
    }
}
