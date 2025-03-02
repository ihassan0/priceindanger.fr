<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Coupon;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
         $coupons = Coupon::all();
        foreach($coupons as $coupon){
            if(($coupon->expire_date !=null && $coupon->expire_date < Date('Y-m-d'))){
               $coupon->update([
                    'status' => 0,
                ]);
            }
     
        }
       }
}
