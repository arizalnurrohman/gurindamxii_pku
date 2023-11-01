<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\MySendMail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $MSG = new MySendMail($this->data);
        // $send_mail=Mail::send([], [], function ($message) use ($MSG) {
        //     $message->from($MSG['FROM']['EMAIL'],$MSG['FROM']['NAME'])
        //             ->to($MSG['TO'])
        //             ->subject($MSG['SUBJECT'])
        //             ->html($MSG['HTML'])
        //             ->text('NO-TEXT');
        // });
        
        Mail::to($this->data['email'])->send($MSG);
    }
}
