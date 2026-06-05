<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $role = $data['role'] ?? 'admin';
        unset($data['role']);
        $data['password'] = Hash::make($data['password']);
        $data['email_verified_at'] = $data['email_verified_at'] ?? now();
        $this->role = $role;

        return $data;
    }

    protected function afterCreate(): void
    {
        /** @var User $user */
        $user = $this->record;
        $user->syncRoles([$this->role]);
    }
}
