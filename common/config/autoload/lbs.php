<?php

// lbs地图
return [
    'amap_lbs_key' => env('AMAP_LBS_KEY', ''),
    'amap_lbs_api' => [
        'ip' => 'http://restapi.amap.com/v3/ip?ip={ip}&output=json&key={key}',
        'geocode_regeo' => 'http://restapi.amap.com/v3/geocode/regeo?location={location}&extensions=base&key={key}',
    ],
];


