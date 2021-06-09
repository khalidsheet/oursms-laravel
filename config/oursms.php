<?php

return [
    /*
     |-----------------------------------------------------------
     |  Oursms Config
     | ----------------------------------------------------------
     |
     | This config file contains your account credentials
     | provided by https://oursms.app service
     |
     | If you don't know how to get these credentials visit
     | oursms.app help center
     | Article: https://help.oursms.app/ar/article/kyf-ytm-astkhdam-khdma-rsalna-aan-tryk-api-1wqs4a/
     |
     | ----------------------------------------------------------
     */


    /*
     |-----------------------------------------------------------
     |  User Identifier
     | ----------------------------------------------------------
     |
     | Your account userId
     |
     | You don't have to worry about the userId and who to write
     | it, This library will handle this kinda stuff for you
     |
     | For example: Your userId may be something like "SP-00434"
     | so you can write it either "SP-00434" or just "434"
     |
     | ----------------------------------------------------------
     */
    'userId' => env('OURSMS_USER_ID', ''),


    /*
     |-----------------------------------------------------------
     |  Account Key
     | ----------------------------------------------------------
     |
     | Your account 32 characters long key
     |
     | ----------------------------------------------------------
     */
    'key' => env('OURSMS_KEY', ''),


    /*
     |-----------------------------------------------------------
     |  Phone number column name
     | ----------------------------------------------------------
     |
     | Type your phone number column name as you defined it
     | in the database
     |
     | Default: phone_number
     |
     | ----------------------------------------------------------
     */
    'phoneNumberKey' => "phone_number"
];
