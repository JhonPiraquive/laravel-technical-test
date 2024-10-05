<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Text Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are placed on views.
    |
    */

    'attributes' => [
        'confirm_password' => 'Confirmar contraseña',
        'email' => 'Dirección de correo electrónico',
        'name' => 'Nombre',
        'password' => 'Contraseña',
        'remember_me' => 'Recuérdame',
        'current_password' => 'Contraseña actual',
        'new_password' => 'Nueva contraseña',
        'phone' => 'Teléfono',
        'address' => 'Dirección',
        'no_data' => 'No hay información'
    ],
    'customer' => [
        'buttons' => [
            'delete' => 'Eliminar',
            'save' => 'Guardar'
        ],
        'content' => [
            'update_title' => 'Actualizar Cliente',
            'delete' => 'Recuerda que al eliminar este registro no podras recuperarlo.',
            'store_title' => 'Crear Cliente'
        ],
        'title' => 'Clientes',
        'table' => [
            'options' => 'Opciones'
        ]
    ],
    'dashboard' => [
        'title' => 'Panel de control',
        'content' => [
            'welcome' => 'Bienvenido!'
        ]
    ],
    'forgot_password' => [
        'buttons' => [
            'forgot' => 'Enviar enlace'
        ],
        'content' => [
            'text1' => '¿Olvidaste tu contraseña? No hay problema. Simplemente déjanos saber tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña, donde podrás elegir una nueva.'
        ]
    ],
    'login' => [
        'buttons' => [
            'login' => 'Iniciar sesión',
        ],
        'default' => [
            'password' => 'Contraseña predeterminada',
            'user' => 'Usuario predeterminado',
        ],
        'links' => [
            'forgot_password' => '¿Olvidaste tu contraseña?',
            'register' => '¿Nuevo Usuario?'
        ]
    ],
    'navigation' => [
        'buttons' => [
            'logout' => 'Salir'
        ]
    ],
    'user' => [
        'buttons' => [
            'save' => 'Guardar'
        ],
        'content' => [
            'information' => 'Información del Perfil',
            'text' => 'Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.',
            'text2' => 'Asegúrate de que tu cuenta esté usando una contraseña larga y aleatoria para mantenerla segura.',
            'update_password' => 'Actualizar Contraseña',
        ],
        'response' => [
            'save' => 'Guardado'
        ],
        'title' => 'Perfil',
    ],
    'register' => [
        'buttons' => [
            'register' => 'Registrarse',
        ],
        'links' => [
            'already_registered' => '¿Ya estás registrado?'
        ]
    ],
    'reset_password' => [
        'buttons' => [
            'reset' => 'Restablecer contraseña'
        ]
    ]
];
