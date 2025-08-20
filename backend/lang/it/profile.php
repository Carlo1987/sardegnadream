<?php

return [
    'profile' => 'Profilo',
    'profile_info' => 'Informazioni profilo',
    'name' => 'Nome',
    'email' => 'Email',
    'role' => 'Ruolo',
    'updatePassword' => 'Aggiorna password',
    'currentPassword' => 'Password attuale',
    'newPassword' => 'Nuova password',
    'confirmPassword' => 'Conferma password',
    'deleteAccount' => 'Elimina account',
    'deleteAccount_alert' => 'Una volta eliminato il tuo account, tutte le sue risorse e dati verranno eliminati definitivamente.',
    'deleteAccount_confirm' => 'Sei sicuro di voler eliminare il tuo account?',
    'deleteAccount_confirm_alert' => 'Una volta eliminato il tuo account, tutte le sue risorse e dati verranno eliminati definitivamente. Inserisci la password per confermare che desideri eliminare permanentemente il tuo account.',
   
    'manageUsers' => 'Gestione utenti',
    'noUsers' => 'Nessun utente presente',
    'addUser' => 'Aggiungi utente',
    'editUser' => 'Modifica utente',
    'deleteUser' => 'Elimina utente',
    'addUser_alert' => 'Verrà creata una password casuale per questo utente e gli verrà recapitata via email.',
    'editUser_alert' => 'Modificando il ruolo di questo utente cambiaranno anche le sue autorizzazioni.',
    'deleteUser_alert' => 'Se procedi, questo utente verrà eliminato definitivamente.',
    'adminNoDeleteble' => 'Un amministratore non può essere eliminato.',

    'roles' => 'Ruoli disponibili',
    'role_admin' => 'Amministratore',
    'role_manager' => 'Gestore',
    'role_manageUsers' => 'Gestisce tutti gli utenti.',
    'role_manageSettings' => 'Gestisce parametri e supplementi.',
    'role_manageHomes' => 'Gestisce case e servizi.',
    'role_manageBookings' => 'Gestisce prenotazioni e recensioni.',

    'newUser_data' => 'Registrazione utente',
    'newUser_textUser' => 'Sei stato registrato sul sito ' . env('APP_NAME') . ' come nuovo utente con il ruolo di :role. Accedi usando queste credenziali, dopo il primo accesso potrai cambiare password dal tuo profilo.',
    'newUser_textAdmin' => 'Hai aggiunto un nuovo utente con ruolo :role. L\'utente ha ricevuto un\'email con le proprie credenziali. Di seguito le credenziali del primo accesso per l\'utente aggiunto.',
];
