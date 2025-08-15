<?php

return [
    'profile' => 'Perfil',
    'profile_info' => 'Información de perfil',
    'name' => 'Nombre',
    'email' => 'Correo electrónico',
    'role' => 'Rol',
    'updatePassword' => 'Actualizar contraseña',
    'currentPassword' => 'Contraseña actual',
    'newPassword' => 'Nueva contraseña',
    'confirmPassword' => 'Confirmar contraseña',
    'deleteAccount' => 'Eliminar cuenta',
    'deleteAccount_alert' => 'Una vez que tu cuenta sea eliminada, todos sus recursos y datos se eliminarán permanentemente.',
    'deleteAccount_confirm' => 'Estas seguro de querer eliminar tu cuenta?',
    'deleteAccount_confirm_alert' => 'Una vez que tu cuenta sea eliminada, todos sus recursos y datos se eliminarán de forma definitiva. Introduce la contraseña para confirmar que deseas eliminar permanentemente tu cuenta',

    'manageUsers' => 'Gestionar usuarios',
    'noUsers' => 'No hay usuarios',
    'addUser' => 'Agregar usuario',
    'editUser' => 'Editar usuario',
    'deleteUser' => 'Eliminar usuario',
    'addUser_alert' => 'Se creará una contraseña aleatoria para este usuario y se le enviará por correo electrónico.',
    'editUser_alert' => 'Al cambiar el rol de este usuario también cambiarán sus permisos.',
    'deleteUser_alert' => 'Si continúas, este usuario se eliminará de forma permanente.',

    'roles' => 'Roles disponibles',
    'role_admin' => 'Administrador',
    'role_manager' => 'Gestor',
    'role_manageSystem' => 'Tiene control total del sistema.',
    'role_manageSettings' => 'Puede modificar la configuración general del sitio.',
    'role_manageBookings' => 'Gestiona reservas, tarifas, pagos y reseñas.',

    'newUser_data' => 'Registro de usuario',
    'newUser_textUser' => 'Has sido registrado en el sitio ' . env('APP_NAME') . ' como nuevo usuario con el rol de :role. Accede usando estas credenciales, después del primer acceso podrás cambiar la contraseña en tu perfil.',
    'newUser_textAdmin' => 'Adicionaste un nuevo usuario con el rol de :role. El usuario recibira un correo con sus credenciales. A continuación las credenciales del primer acceso para el usuario agregado.',
];

