<?php

use App\Models\User;

/*
$server_protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
$base_path = $server_protocol . $_SERVER['SERVER_NAME'];
*/

$base_path = 'http://gotwork.test';


define('BASE_PATH', $base_path.'/');

define('ASSETS_BACKEND', BASE_PATH.'assets/backend/');

// Uploaded Images
define('UPLOADS', BASE_PATH.'images/profile/');


// Get Profile Completion Percentage
function getProfileCompletedPercentage()
{
    $maximumPoints  = 3;
    $point = 0;

    $row = User::where('id','=',Auth::user()->id)->first();

    if ($row->name) {
        $point++;
    }

    if ($row->email) {
        $point++;
    }

    if ($row->description) {
        $point++;
    }
    

    $percentage = round(($point/$maximumPoints)*100);
    return $percentage."%";
}

// Get Project Sort Types
function getProjectSortTypes()
{
    return [
        'latest',
        'oldest',
        'lowest_price',
        'highest_price',
        'most_bids',
        'fewer_bids'
    ];
}