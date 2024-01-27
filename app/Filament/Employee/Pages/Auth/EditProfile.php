<?php

namespace App\Filament\Employee\Pages\Auth;

use Filament\Pages\Page;

use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;

class EditProfile extends BaseEditProfile
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        TextInput::make('phone_number')
                        ->tel(), // or
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),

                    ])
                    ->statePath('data'),
            ),
        ];
    }
}
