<?php
function hello()
{
    return "Hello world";
}

if (!function_exists("is_admin")) {
    function is_admin()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            if (\Illuminate\Support\Facades\Auth::user()->__get("role") == \App\User::ADMIN_ROLE) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists("format_money")) {
    function format_money($money)
    {
        return "$" . number_format($money, 2);
    }
}
if (!function_exists("notify")) {
    function notify($channel, $event, $data)
    {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '70f132f573337adef266',
            '13c33af0fd11851fc40a',
            '1020635',
            $options
        );
        $pusher->trigger($channel, $event, $data);
    }
}

