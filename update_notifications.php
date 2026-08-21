<?php

use Illuminate\Support\Facades\DB;

foreach (DB::table('notifications')->get() as $n) {
    $data = json_decode($n->data, true);
    if (isset($data['message'])) {
        if (str_contains($data['message'], 'অনুরোধ করেছেন')) {
            $data['message'] = $data['student_name'] . ' has requested a session on "' . $data['topic'] . '"';
        } elseif (str_contains($data['message'], 'অনুমোদন করেছেন')) {
            $data['message'] = $data['mentor_name'] . ' has approved your session on "' . $data['topic'] . '". Please make payment.';
        } elseif (str_contains($data['message'], 'পেমেন্ট সম্পন্ন করেছেন')) {
            $data['message'] = $data['student_name'] . ' has completed payment. Session confirmed.';
        }
        DB::table('notifications')->where('id', $n->id)->update(['data' => json_encode($data, JSON_UNESCAPED_UNICODE)]);
    }
}
echo "Updated notifications.\n";
