<?php

namespace App\Console\Commands;

use Exception;
use App\Message;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Jobs\SyncOutboundStatus;

class CheckPendingOutbound extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pending:outbound';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attempts to check and update any pending outbound messages against carrier status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Getting pending outbound messages...");
        try{
            $messages = Message::where('created_at', '>=', Carbon::now()->subHours(24 ) )->where('direction', 'outbound' )->whereIn('status', ['pending','sent'])->get();
        }
        catch( Exception $e )
        {
            $this->error("Unable to get pending outbound messages");
            return;
        }

        $this->info( $messages->count() . " pending outbound message(s) found");

        foreach( $messages as $message )
        {
            SyncOutboundStatus::dispatch( $message );
        }

        $this->info("Pending outbound messages updated");
    }
}
