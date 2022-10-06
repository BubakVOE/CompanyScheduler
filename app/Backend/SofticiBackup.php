<?php

namespace App\Backend;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;

class SofticiBackup
{
    public static function backupDB($file_path, $file_extension = null)
    {
        try {
            $client = new Client(['verify' => false]);
            $data = [
                [
                    'name' => 'file',
                    'contents' => Utils::tryFopen($file_path, 'r'),
                ],
                [
                    'name' => 'password',
                    'contents' => env('SOFTICI_BACKUP_PASSWORD'),
                ],
            ];
            if ($file_extension != null) {
                $data[] = [
                    'name' => 'file_extension',
                    'contents' => $file_extension,
                ];
            }
            $response = $client->post(env('SOFTICI_BACKUP_URL'), ['multipart' => $data]);

            $response = $response->getBody()->getContents();
        } catch (\Exception $exception) {
            dump($exception);
        }
    }

    //mysql dump must be installed: apt install mysql-client-core-8.0
    public static function databaseBackup()
    {
        try {
            $filename = 'backup-'.Carbon::now()->format('Y-m-d').'.sql';

            //choose path for backup files
            $path = storage_path().'/app/public/db_backup/'.$filename;

            $command = 'mysqldump --no-tablespaces --user='.env('DB_USERNAME').' --password='.env('DB_PASSWORD').' --host='.env('DB_HOST').' '.env('DB_DATABASE').' > '.$path;

            $returnVar = null;

            $output = null;

            exec($command, $output, $returnVar);

            return $path;
        } catch (\Exception $exception) {
            dump($exception);

            return null;
        }
    }
}
