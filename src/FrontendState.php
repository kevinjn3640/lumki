<?php

namespace Lumki\Lumki;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontendState
{
    /**
     * Get the data should be shared with the frontend.
     *
     * @param string $type
     * @param \Illuminate\Database\Eloquent\Model $billable
     * @return array
     */
    public function current()
    {
        return [
            'usersData' => User::with('roles')->get()->map(function ($usersData) {
                return [
                    'id' => $usersData->id,
                    'name' => $usersData->name,
                    'email' => $usersData->email,
                    'email_verified_at' => $usersData->email_verified_at,
                    'profile_photo_path' => $usersData->profile_photo_path,
                    'profile_photo_url' => $usersData->profile_photo_url,
                    'roles' => collect($usersData->roles)->map(function ($role) {
                        return [
                            'name' => $role->name,
                            'pivot' => (object)collect([
                                'model_id' => $role->pivot->model_id,
                                'role_id' => $role->pivot->role_id,
                            ])
                        ];
                    }),
                    'canBeImpersonated' => can_be_impersonated(User::find($usersData->id)),
                    'isImpersonating' => is_impersonating(),
                    'canImpersonate' => can_impersonate(),
                    'isAdmin' => User::find($usersData->id)->hasAnyRole('Superadmin|Admin'),
                ];
            })
        ];
    }
}
