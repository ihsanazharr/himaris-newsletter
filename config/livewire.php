<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Temporary File Uploads
    |--------------------------------------------------------------------------
    |
    | Livewire supports third-party file uploads. For security, these uploads
    | are stored in a temporary directory. Here you can configure the disk
    | and directory used for storing these temporary files.
    |
    | We set the disk to 'public' to ensure compatibility with shared hosting
    | environments like Hostinger where the 'local' private storage path
    | may encounter permission or ownership restrictions (UnableToRetrieveMetadata).
    |
    */

    'temporary_file_upload' => [
        'disk' => 'public',
        'rules' => ['required', 'file', 'max:12288'], // 12MB max by default
        'directory' => 'livewire-tmp',
        'middleware' => 'web',
    ],

];
