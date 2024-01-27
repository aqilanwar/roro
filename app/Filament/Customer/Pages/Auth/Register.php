<?php

namespace App\Filament\Customer\Pages\Auth;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\TextInput;

class Register extends BaseRegister 
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        TextInput::make('phone_number'),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),

                    ])
                    ->statePath('data'),
            ),
        ];
    }
}
