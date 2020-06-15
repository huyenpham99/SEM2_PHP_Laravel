<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\MailToUserAfterOrderCreate;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MailToUserAfterOrderCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(OrderCreated $event)
    {
        $order  = $event->order;
        //lay email
        $user =User::find($order->__get("user_id"));
        //nguoi dung lay don hang


    }

    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order =$event->order;
        $user =User::find($order->__get("user_id"));
        //nhiều khi mail giả nên k thể gửi được nên ta cần để trong try catch
        try {
            Mail::to($user->__get("email"))
                ->send(new MailToUserAfterOrderCreate($user));
        }catch (\Exception $exception){

        }

    }
}
