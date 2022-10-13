<?php

namespace App\Console\Commands;

use App\Backend\SofticiBackup;
use Carbon\Carbon;
use Illuminate\Console\Command;

class worker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'worker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'runs worker';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // $backup_path = SofticiBackup::databaseBackup();
        // SofticiBackup::backupDB($backup_path,'sql');

        // -------------------------


        $last_database_backup = Carbon::now()->subDay();
        while (1) {
            try {
                if ($last_database_backup < Carbon::now()->subDay()) {
                    $backup_path = SofticiBackup::databaseBackup();
                    SofticiBackup::backupDB($backup_path, 'sql');
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                sleep(60);
            }
        }

        // -------------------------

        // return 0;

        // $last_database_backup = Carbon::now()->subDay();

        // while (1) {
        //     if($last_database_backup < Carbon::now()->subDay()){
        //         $backup_path = SofticiBackup::databaseBackup();
        //         SofticiBackup::backupDB($backup_path,'sql');
        //     }
        //     sleep(3200);
        // }

    }

    public function generatePDFs()
    {
    }
}
