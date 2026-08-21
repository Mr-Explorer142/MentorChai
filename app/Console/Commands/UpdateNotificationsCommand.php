<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateNotificationsCommand extends Command
{
    protected $signature = 'notifications:translate';
    protected $description = 'Translate existing Bengali notifications in the database to English';

    public function handle()
    {
        $notifications = DB::table('notifications')->get();
        $count = 0;

        foreach ($notifications as $n) {
            $data = json_decode($n->data, true);
            if (isset($data['message'])) {
                $changed = false;
                if (str_contains($data['message'], 'অনুরোধ করেছেন')) {
                    $data['message'] = $data['student_name'] . ' has requested a session on "' . $data['topic'] . '"';
                    $changed = true;
                } elseif (str_contains($data['message'], 'অনুমোদন করেছেন')) {
                    $data['message'] = $data['mentor_name'] . ' has approved your session on "' . $data['topic'] . '". Please make payment.';
                    $changed = true;
                } elseif (str_contains($data['message'], 'পেমেন্ট সম্পন্ন করেছেন')) {
                    $data['message'] = $data['student_name'] . ' has completed payment. Session confirmed.';
                    $changed = true;
                }

                if ($changed) {
                    DB::table('notifications')->where('id', $n->id)->update(['data' => json_encode($data, JSON_UNESCAPED_UNICODE)]);
                    $count++;
                }
            }
        }
        $this->info("Translated $count notifications successfully.");
    }
}
