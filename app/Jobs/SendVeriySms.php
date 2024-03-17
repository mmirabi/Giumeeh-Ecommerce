<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendVeriySms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $phone,
        public string $code,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Http::withHeaders([
            'x-api-key' => getenv('SMS_DOT_IR_API_KEY'),
            'Accept' => 'text/plain',
            'Content-Type' => 'application/json',
        ])
            ->post(getenv('SMS_DOT_IR_BASE_URL') . '/v1/send/verify', [
                'mobile' => $this->phone,
                'templateId' => getenv('SMS_TEMPLATE_ID'),
                'parameters' => [
                    [
                        'name' => 'Code',
                        'value' => $this->code,
                    ]
                ]
            ])
            ->throwIf(function ($e) {
                Log::alert('sms', $e->json());
            })
            ->json();
    }
}
