<?php

namespace App\Http\Controllers;

use App\Models\IndonesiaEvent;
use App\Models\IndosatCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class CertificateController extends Controller
{
    public function certificate()
    {
        $user = Auth::guard('indosat_user')->user();
        $certificates = [];
        $user_certificates = [];

        if ($user) {
            $certificates = $user->userEvents;
            $user_certificates = IndosatCertificate::where('user_id', $user->id)->get();
        }
        $user_certificate_event_ids = $user_certificates->pluck('event_id')->toArray();

        return view('indosat_certificate', compact('certificates', 'user_certificates', 'user_certificate_event_ids'));
    }

    public function preview($event_id, $indosat_user_id)
    {

        $user = Auth::guard('indosat_user')->user();
        $certificate = null;
        $certificate = IndosatCertificate::where('user_id', $indosat_user_id)->where('event_id', $event_id)->first();

        if (is_null($certificate)) {
            return back();
        }
        return view('certificate_preview', compact('certificate'));
    }
    public function download($event_id, $indosat_user_id)
    {
        $certificate = IndosatCertificate::where('user_id', $indosat_user_id)->where('event_id', $event_id)->first();

        if (is_null($certificate)) {
            return back();
        }

        $pdf = PDF::loadView('certificate_download', compact('certificate'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true, 'isRemoteEnabled' => true])
            ->setOption('images', true);

        // return $pdf->stream('certificate.pdf');

        return $pdf->download('certificate.pdf');
    }

    public function unlockCertificate(Request $request)
    {
        $user = Auth::guard('indosat_user')->user();
        if (is_null($user)) {
            return back();
        }

        $request->validate([
            'event_id' => 'required',
            'certificate_code' => 'required',
        ]);

        $event = IndonesiaEvent::find($request->event_id);
        if ($event->certificate_code == $request->certificate_code) {

            $existingCertificate = IndosatCertificate::where('event_id', $request->event_id)
                ->where('user_id', $user->id)
                ->first();

            if (!$existingCertificate) {
                IndosatCertificate::create([
                    'event_id' => $request->event_id,
                    'user_id' => $user->id,
                ]);
            }
        }

        return back();
    }
}
