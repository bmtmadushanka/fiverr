<?php

namespace App\Classes;

use App\Models\UserPermission;
use App\Models\Applications;
use Auth;
use Illuminate\Support\Facades\Session;

Class permission {

    public static $perms = [
        2 => 'dashboard',
        3 => 'request',
            31 => 'request-add',
            32 => 'request-edit',
            33 => 'request-delete',
        4 => 'field',
            41 => 'field-add',
            42 => 'field-delete',
            43 => 'field-import',
        5 => 'role',
            51 => 'role-add',
            52 => 'role-edit',
            53 => 'role-delete',
        6 => 'user',
            61 => 'user-add',
            62 => 'user-edit',
            63 => 'user-delete',
        7 => 'user-info',
            71 => 'user-info-edit',
       
    ];

    public static function permitted($page)
    {
        $userID = Session::get('userId');

        $perms=self::$perms;
        $permid = array_search($page, $perms);
        if($userID==1) {
            // Super Admin (Allow all options)
            return "success";
        } else {
            $permcheck = UserPermission::where('id', $userID)->where('permission_id', $permid)->first();
           $permcheck = 1;
        }

        if ($permcheck == NULL) {
            return "fail";
        } else {
            return "success";
        }
    }

}