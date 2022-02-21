<?php
use Illuminate\Support\Facades\Request;

if (!function_exists('responseJson')) {
    function responseJson($status, $message, $data = null)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response);
    }
}

if (!function_exists('adminUrl')) {
    function adminUrl($url = null)
    {
        return url('admin/' . $url);
    }
}

if (!function_exists('active_menu')) {
    function active_menu($link)
    {
        if (preg_match('/' . $link . '/i', Request::segment(2))) {
            return ['menu-open', 'display:block'];
        } else {
            return ['', ''];
        }
    }
}

if (!function_exists('lang')){
    function lang()
    {
        if (session()->has('lang')){
            return session('lang');
        }else{
            return 'en';
        }
    }
}

if (!function_exists('appDirection')) {
    function appDirection()
    {
        if (session()->has('lang')) {
            if (session('lang') == 'ar') {
                return 'rtl';
            } else {
                return 'ltr';
            }
        } else {
            return 'ltr';
        }
    }
}

