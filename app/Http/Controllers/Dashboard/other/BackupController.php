<?php

namespace App\Http\Controllers\Dashboard\other;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index()
    {
        // $path = storage_path() . "/app/db_backup/";

        // dd($path);

        return view('pages.dashboard.other.backUp');
    }

    public function backupDB(Request $request)
    {
        // //dd(File::isFile(storage_path(). "/app/public/db_backup/backup-2022-09-14.sql"));


        $name = 'backup-'.Carbon::now()->format('Y-m-d').'.sql';

        $file = File::isFile(storage_path('app/public/db_backup/').$name);

        if ($file == true) {
            return ['success' => 'exist'];
        } else {
            Artisan::call('worker');

            return ['success' => true];
        }
    }

    public function removeDB(Request $request, $name)
    {
        $path = storage_path('app/public/db_backup/').$name;

        File::delete($path);

        return ['success' => true];

    }

    // public function backup()
    // {
    //     dd(Artisan::call('backup:run'));
    // }

    // public function db($name)
    // {

    //     //(File::allFiles(storage_path(). "/app/db_backup");

    //     $backups = File::allFiles(storage_path(). "/app/db_backup");

    //     foreach ($backups as $backup) {
    //         $test[] = $backup->getFilename();
    //     }

    //     dd($test);

    //     dd(storage_path());

    //     dd($name);
    //     return 'kokot';
    // }

    // public static function backupDB($file_path, $file_extension = null)
    // {
    //     try {
    //         $client = new Client(['verify' => false]);
    //         $data = [
    //             [
    //                 'name' => 'file',
    //                 'contents' => Utils::tryFopen($file_path, 'r')
    //             ],
    //             [
    //                 'name' => 'password',
    //                 'contents' => env('SOFTICI_BACKUP_PASSWORD')
    //             ],
    //         ];
    //         if ($file_extension != null) {
    //             $data[] = [
    //                 'name' => 'file_extension',
    //                 'contents' => $file_extension
    //             ];
    //         }
    //         $response = $client->post(env('SOFTICI_BACKUP_URL'), ['multipart' => $data]);

    //         $response = $response->getBody()->getContents();

    //     } catch (\Exception $exception) {
    //         dump($exception);
    //     }
    // }

    // //mysql dump must be installed: apt install mysql-client-core-8.0
    // public static function databaseBackup()
    // {
    //     try {

    //         $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";

    //         //choose path for backup files
    //         $path = storage_path() . "/app/db_backup/" . $filename;

    //         $command = "mysqldump --no-tablespaces --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " > " . $path;

    //         $returnVar = NULL;

    //         $output = NULL;

    //         exec($command, $output, $returnVar);

    //         return $path;
    //     } catch (\Exception $exception) {
    //         dump($exception);
    //         return null;
    //     }
    // }
}
