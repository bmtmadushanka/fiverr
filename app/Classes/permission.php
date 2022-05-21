<?php

namespace App\Classes;

use App\Models\UserPermission;
use App\Models\Applications;
use Auth;
use Illuminate\Support\Facades\Session;

Class permission {

    public static $perms = [
        1 => 'dashboard',
        2 => 'dispatcher',
        3 => 'passenger',
            31 => 'passenger-add',
            32 => 'passenger-edit',
            33 => 'passenger-deactive',
        4 => 'driver',
            41 => 'driver-add',
            42 => 'driver-edit',
            43 => 'driver-deactive',
        5 => 'referral',
            51 => 'referral-add',
            52 => 'referral-edit',
        6 => 'milage-rate',
            61 => 'milage-rate-add',
            62 => 'milage-rate-edit',
        7 => 'location-rate',
            71 => 'location-rate-add',
            72 => 'location-rate-edit',
            73 => 'location-rate-delete',
        8 => 'special-date-rate',
            81 => 'special-date-rate-add',
            82 => 'special-date-rate-edit',
            83 => 'special-date-rate-delete',
        9 => 'custom-date-rate',
            91 => 'custom-date-rate-add',
            92 => 'custom-date-rate-edit',
            92 => 'custom-date-rate-delete',
        10 => 'fleet-rate',
            101 => 'fleet-rate-edit',
        11 => 'users',
            111 => 'users-add',
            112 => 'users-edit',
            113 => 'users-deactive',
        12 => 'role',
            121 => 'role-add',
            122 => 'role-edit',
        13 => 'booking',
            131 => 'booking-view',
        14 => 'company-setting',
            141 => 'company-setting-save',
        15 => 'contact-setting',
            151 => 'company-setting-save',
        16 => 'ticket',
        17 => 'reports',
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
           // $permcheck = UserPermission::where('user_permission_user_auto_id', $userID)->where('user_permission_id', $permid)->first();
           $permcheck = 1;
        }

        if ($permcheck == NULL) {
            return "fail";
        } else {
            return "success";
        }
    }

}