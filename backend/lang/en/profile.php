<?php

return [
    'profile' => 'Profile',
    'profile_info' => 'Profile Information',
    'name' => 'Name',
    'email' => 'Email',
    'role' => 'Role',
    'updatePassword' => 'Update Password',
    'currentPassword' => 'Current Password',
    'newPassword' => 'New Password',
    'confirmPassword' => 'Confirm Password',
    'deleteAccount' => 'Delete Account',
    'deleteAccount_alert' => 'Once your account is deleted, all of its resources and data will be permanently deleted.',
    'deleteAccount_confirm' => 'Are you sure you want to delete your account?',
    'deleteAccount_confirm_alert' => 'Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.',

    'manageUsers' => 'Manage Users',
    'noUsers' => 'No users',
    'addUser' => 'Add User',
    'editUser' => 'Edit User',
    'deleteUser' => 'Delete User',
    'addUser_alert' => 'A random password will be created for this user and sent to them via email.',
    'editUser_alert' => 'Changing the role of this user will also change their permissions.',
    'deleteUser_alert' => 'If you proceed, this user will be permanently deleted.',

    'roles' => 'Roles Available',
    'role_admin' => 'Administrator',
    'role_manager' => 'Manager',
    'role_manageSystem' => 'Has full control of the system.',
    'role_manageSettings' => 'Can modify the general site settings.',
    'role_manageBookings' => 'Manages bookings, rates, payments, reviews.',

    'newUser_data' => 'Registration User',
    'newUser_textUser' => 'You have been registered on the site ' . env('APP_NAME') . ' as a new user with the role of :role. Access using these credentials, after the first access you will be able to change the password from your profile.',
    'newUser_textAdmin' => 'You have added a new user with the role of :role. The user will receive an email with their credentials. Below are the credentials for the first access for the user added.',
];