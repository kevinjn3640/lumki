<?php

namespace Lumki\Lumki;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontendState
{
    /**
     * Get the data should be shared with the frontend.
     *
     * @param  string  $type
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @return array
     */
    public function current()
    {
        return [
//            'userAvatar' => $user->profile_photo_url,
            'userName' => Auth::user()->name,
        ];
    }
}
