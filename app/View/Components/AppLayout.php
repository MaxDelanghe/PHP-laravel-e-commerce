<?php

namespace App\View\Components;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
            if (Auth::user()->email_verified_at == '') return view('Register');
            $id_user = Auth::user()->id;
            $data = Chat::where('dest_id' , '=' , $id_user)->where('readed', '=', 0)->get()->count();
            return view('layouts.app', array('new_messages' => $data ));
    }
}
