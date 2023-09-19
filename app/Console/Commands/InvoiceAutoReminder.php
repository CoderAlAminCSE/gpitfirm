<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Console\Command;
use App\Mail\InvoiceReminderMail;
use Illuminate\Support\Facades\Mail;

class InvoiceAutoReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders  = Order::where('created_at', '<=', Carbon::now()->subHours(24))->where('payment_status', 0)
            ->whereNull('canceled_at')->get();

        foreach ($orders as $order) {
            $invoice  = Invoice::with('order', 'user', 'order.items')->where('order_id', $order->id)->first();
            $details = [
                'from' => env('MAIL_FROM_ADDRESS'),
                'subject' => siteSetting('company_name') . ' - Complete your order',
                'company_phone' => siteSetting('company_phone'),
                'company_website' => siteSetting('company_website'),
                'company_name' => siteSetting('company_name'),
            ];

            $receiver = User::where('id', $invoice->user->id)->first();
            if ($receiver) {
                Mail::to($receiver->email)->send(new InvoiceReminderMail($details, $invoice));
            }
        }
    }
}
