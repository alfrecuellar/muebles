<?php

return [

    'fields' => [
        'name'    => "nombre",
        'phone'   => "telefono",
        'email'   => "email",
        'address' => "dirección",
    ],
    'error' => [
        'name_required'    => 'El nombre es obligatorio',
        'name_max'         => 'El nombre no puede tener mas de :max caracteres',
        'phone_required'   => 'El telefono es obligatorio',
        'phone_max'        => 'El telefono no puede tener mas de :max caracteres',
        'email_required'   => 'El email es obligatorio',
        'email_max'        => 'El email no puede tener mas de :max caracteres',
        'email_email'      => 'El email es invalido',
        'address_required' => 'La dirección es obligatoria',
        'address_max'      => 'La dirección no puede tener mas de :max caracteres',
    ]

];
