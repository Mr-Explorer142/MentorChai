<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Enums\SessionStatus;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\MentoringSession;
use App\Models\Payment;
use App\Models\SessionTopic;
use App\Notifications\PaymentReceivedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    // // Step 1: Student clicks "Pay" — initiate payment
    // public function initiate(Request $request)
    // {

    //     // Log::info('Initiate called', $request->all());
    //     // dd($request->all());
    //     dd('reached');

    //     $request->validate([
    //         'session_topic_id' => 'required|exists:session_topics,id',
    //         'payment_method'   => 'required|string',
    //     ]);

    //     $sessionTopic = SessionTopic::with(['mentor.profile', 'student'])
    //         ->findOrFail($request->session_topic_id);

    //     // Security check
    //     abort_unless((int) Auth::id() === (int) $sessionTopic->student_id, 403);
    //     abort_if($sessionTopic->status !== SessionStatus::Approved, 403);

    //     $hourlyRate = (float) $sessionTopic->mentor->profile->hourly_rate;
    //     $amount     = $hourlyRate; // 1 hour session, make dynamic later
    //     $tranId     = 'MC-' . uniqid();

    //     // Create MentoringSession record
    //     $mentoringSession = MentoringSession::create([
    //         'session_code'  => MentoringSession::generateCode(),
    //         'mentor_id'     => $sessionTopic->mentor_id,
    //         'student_id'    => $sessionTopic->student_id,
    //         'topic_id'      => $sessionTopic->id,
    //         'scheduled_at'  => null,
    //         'hourly_rate'   => $hourlyRate,
    //         'amount'        => $amount,
    //         'status'        => SessionStatus::Pending,
    //     ]);

    //     // Create pending Payment record
    //     Payment::create([
    //         'session_id'     => $mentoringSession->id,
    //         'student_id'     => Auth::id(),
    //         'mentor_id'      => $sessionTopic->mentor_id,
    //         'amount'         => $amount,
    //         'platform_fee'   => round($amount * 0.10, 2),
    //         'mentor_earning' => round($amount * 0.90, 2),
    //         'method'         => $request->payment_method,
    //         'transaction_id' => $tranId,
    //         'status'         => PaymentStatus::Pending,
    //     ]);

    //     // Build SSLCommerz post data
    //     $post_data                    = [];
    //     $post_data['total_amount']    = $amount;
    //     $post_data['currency']        = 'BDT';
    //     $post_data['tran_id']         = $tranId;

    //     // Customer info
    //     $post_data['cus_name']        = Auth::user()->name;
    //     $post_data['cus_email']       = Auth::user()->email;
    //     $post_data['cus_add1']        = Auth::user()->profile?->address ?? 'Dhaka';
    //     $post_data['cus_add2']        = '';
    //     $post_data['cus_city']        = 'Dhaka';
    //     $post_data['cus_state']       = 'Dhaka';
    //     $post_data['cus_postcode']    = '1200';
    //     $post_data['cus_country']     = 'Bangladesh';
    //     $post_data['cus_phone']       = Auth::user()->profile?->phone ?? '01700000000';
    //     $post_data['cus_fax']         = '';

    //     // Shipment info (not physical, set NO)
    //     $post_data['ship_name']       = Auth::user()->name;
    //     $post_data['ship_add1']       = 'Dhaka';
    //     $post_data['ship_add2']       = 'Dhaka';
    //     $post_data['ship_city']       = 'Dhaka';
    //     $post_data['ship_state']      = 'Dhaka';
    //     $post_data['ship_postcode']   = '1200';
    //     $post_data['ship_phone']      = '';
    //     $post_data['ship_country']    = 'Bangladesh';
    //     $post_data['shipping_method'] = 'NO';

    //     // Product info
    //     $post_data['product_name']     = 'Mentoring Session - ' . $sessionTopic->topic;
    //     $post_data['product_category'] = 'Education';
    //     $post_data['product_profile']  = 'general';

    //     // Pass IDs via value_a and value_b for use in callbacks
    //     $post_data['value_a'] = $mentoringSession->id;
    //     $post_data['value_b'] = $sessionTopic->id;

    //     $sslc           = new SslCommerzNotification();
    //     $payment_options = $sslc->makePayment($post_data, 'hosted');

    //     if (!is_array($payment_options)) {
    //         return redirect()->back()->with('error', 'পেমেন্ট শুরু করতে সমস্যা হয়েছে।');
    //     }
    // }

    public function initiate(Request $request)
    {
        Log::info('Step 1 - Request received', $request->all());

        $request->validate([
            'session_topic_id' => 'required|exists:session_topics,id',
            'payment_method'   => 'required|string',
        ]);

        Log::info('Step 2 - Validation passed');

        $sessionTopic = SessionTopic::with(['mentor.profile', 'student'])
            ->findOrFail($request->session_topic_id);

        Log::info('Step 3 - Session topic found', ['id' => $sessionTopic->id]);

        abort_unless((int) Auth::id() === (int) $sessionTopic->student_id, 403);

        Log::info('Step 4 - Auth check passed');

        abort_if($sessionTopic->status !== SessionStatus::Approved, 403);

        Log::info('Step 5 - Status check passed');

        $hourlyRate    = (float) $sessionTopic->mentor->profile->hourly_rate;
        $durationHours = (int) ($sessionTopic->duration_hours ?? 1);
        $amount        = $hourlyRate * $durationHours;
        $tranId        = 'MC-' . uniqid();

        Log::info('Step 6 - Amount calculated', [
            'hourlyRate'    => $hourlyRate,
            'durationHours' => $durationHours,
            'amount'        => $amount,
            'tranId'        => $tranId,
        ]);

        $mentoringSession = MentoringSession::create([
            'session_code'     => MentoringSession::generateCode(),
            'mentor_id'        => $sessionTopic->mentor_id,
            'student_id'       => $sessionTopic->student_id,
            'topic_id'         => $sessionTopic->id,
            'scheduled_at'     => null,
            'hourly_rate'      => $hourlyRate,
            'amount'           => $amount,
            'duration_minutes' => $durationHours * 60,
            'status'           => SessionStatus::Pending,
        ]);

        Log::info('Step 7 - MentoringSession created', ['id' => $mentoringSession->id]);

        Payment::create([
            'session_id'     => $mentoringSession->id,
            'student_id'     => Auth::id(),
            'mentor_id'      => $sessionTopic->mentor_id,
            'amount'         => $amount,
            'platform_fee'   => round($amount * 0.10, 2),
            'mentor_earning' => round($amount * 0.90, 2),
            'method'         => $request->payment_method,
            'transaction_id' => $tranId,
            'status'         => PaymentStatus::Pending,
        ]);

        Log::info('Step 8 - Payment created');

        $post_data                     = [];
        $post_data['total_amount']     = $amount;
        $post_data['currency']         = 'BDT';
        $post_data['tran_id']          = $tranId;
        $post_data['cus_name']         = Auth::user()->name;
        $post_data['cus_email']        = Auth::user()->email;
        $post_data['cus_add1']         = Auth::user()->profile?->address ?? 'Dhaka';
        $post_data['cus_add2']         = '';
        $post_data['cus_city']         = 'Dhaka';
        $post_data['cus_state']        = 'Dhaka';
        $post_data['cus_postcode']     = '1200';
        $post_data['cus_country']      = 'Bangladesh';
        $post_data['cus_phone']        = Auth::user()->profile?->phone ?? '01700000000';
        $post_data['cus_fax']          = '';
        $post_data['ship_name']        = Auth::user()->name;
        $post_data['ship_add1']        = 'Dhaka';
        $post_data['ship_add2']        = 'Dhaka';
        $post_data['ship_city']        = 'Dhaka';
        $post_data['ship_state']       = 'Dhaka';
        $post_data['ship_postcode']    = '1200';
        $post_data['ship_phone']       = '';
        $post_data['ship_country']     = 'Bangladesh';
        $post_data['shipping_method']  = 'NO';
        $post_data['product_name']     = 'Mentoring Session - ' . $sessionTopic->topic;
        $post_data['product_category'] = 'Education';
        $post_data['product_profile']  = 'general';
        $post_data['value_a']          = $mentoringSession->id;
        $post_data['value_b']          = $sessionTopic->id;

        Log::info('Step 9 - Post data built', $post_data);

        $sslc            = new SslCommerzNotification();
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        Log::info('Step 10 - SSLCommerz response', ['response' => $payment_options]);

        if (!is_array($payment_options)) {
            Log::error('SSLCommerz failed', ['response' => $payment_options]);
            return redirect()->back()->with('error', 'পেমেন্ট শুরু করতে সমস্যা হয়েছে।');
        }
    }

    // Step 2: SSLCommerz redirects here on success
    public function success(Request $request)
    {
        Log::info('SSLCommerz success callback', $request->all());

        $tran_id  = $request->input('tran_id');
        $amount   = $request->input('amount');
        $currency = $request->input('currency');

        $sslc    = new SslCommerzNotification();
        $payment = Payment::where('transaction_id', $tran_id)->first();

        if (!$payment) {
            Log::error('Payment not found for tran_id: ' . $tran_id);
            return redirect()->route('student_dashboard')
                ->with('error', 'পেমেন্ট তথ্য পাওয়া যায়নি।');
        }

        if ($payment->status === PaymentStatus::Pending) {

            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);
            Log::info('Validation result: ' . ($validation ? 'true' : 'false'));

            if ($validation) {
                // Update payment
                $payment->update([
                    'status'  => PaymentStatus::Paid,
                    'paid_at' => now(),
                ]);

                // Update mentoring session
                $mentoringSession = $payment->session;
                $mentoringSession->update([
                    'status'     => SessionStatus::Ongoing,
                    'started_at' => now(),
                ]);

                // Notify mentor
                $mentoringSession->mentor->notify(
                    new PaymentReceivedNotification($mentoringSession->topic)
                );

                // ✅ Pass tran_id in URL instead of flash session
                return redirect()->route('success', ['tran_id' => $payment->transaction_id]);
            }

            Log::error('Payment validation failed for tran_id: ' . $tran_id);
            return redirect()->route('student_dashboard')
                ->with('error', 'পেমেন্ট যাচাই ব্যর্থ হয়েছে।');
        } elseif ($payment->status === PaymentStatus::Paid) {

            // ✅ Already paid — same approach
            return redirect()->route('success', ['tran_id' => $payment->transaction_id]);
        }

        return redirect()->route('student_dashboard')
            ->with('error', 'পেমেন্ট যাচাই ব্যর্থ হয়েছে।');
    }

    // Step 3: SSLCommerz redirects here on failure
    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $payment = Payment::where('transaction_id', $tran_id)->first();

        if ($payment && $payment->status === PaymentStatus::Pending) {
            $payment->update(['status' => PaymentStatus::Failed]);
        }

        return redirect()->route('student_dashboard')
            ->with('error', 'পেমেন্ট ব্যর্থ হয়েছে। আবার চেষ্টা করুন।');
    }

    // Step 4: SSLCommerz redirects here on cancel
    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $payment = Payment::where('transaction_id', $tran_id)->first();

        if ($payment && $payment->status === PaymentStatus::Pending) {
            $payment->update(['status' => PaymentStatus::Failed]);
        }

        return redirect()->route('student_dashboard')
            ->with('error', 'পেমেন্ট বাতিল করা হয়েছে।');
    }

    // Step 5: IPN — SSLCommerz server-to-server notification
    public function ipn(Request $request)
    {
        if (!$request->input('tran_id')) {
            return response('Invalid Data', 400);
        }

        $tran_id = $request->input('tran_id');
        $payment = Payment::where('transaction_id', $tran_id)->first();

        if (!$payment) {
            return response('Order Not Found', 404);
        }

        if ($payment->status === PaymentStatus::Pending) {
            $sslc       = new SslCommerzNotification();
            $validation = $sslc->orderValidate(
                $request->all(),
                $tran_id,
                $payment->amount,
                'BDT'
            );

            if ($validation) {
                $payment->update([
                    'status'  => PaymentStatus::Paid,
                    'paid_at' => now(),
                ]);

                $payment->session->update([
                    'status'     => SessionStatus::Ongoing,
                    'started_at' => now(),
                ]);

                $payment->session->mentor->notify(
                    new PaymentReceivedNotification($payment->session->topic)
                );

                return response('Transaction Successful', 200);
            }
        } elseif ($payment->status === PaymentStatus::Paid) {
            return response('Transaction Already Completed', 200);
        }

        return response('Invalid Transaction', 400);
    }
}
