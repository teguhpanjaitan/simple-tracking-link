<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use App\Models\TrackerLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    // Lander: tampilkan form + auto capture gclid/sub_id dari query
    public function lander(Request $request)
    {
        return view('lander', [
            'gclid'  => (string)$request->query('gclid', ''),
            'sub_id' => (string)$request->query('sub_id', ''),
        ]);
    }

    // Submit lead: insert lead + tulis tracker_logs(event=lead)
    public function store(StoreLeadRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $lead = Lead::create($request->validated());

            TrackerLog::create([
                'lead_id' => $lead->id,
                'event'   => 'lead',
                'details' => [
                    'source' => 'lander',
                    'gclid'  => $lead->gclid,
                    'sub_id' => $lead->sub_id,
                    'note'   => 'Lead created via LeadController@store'
                ],
            ]);

            return redirect()->route('thankyou', ['lead_id' => $lead->id]);
        });
    }

    // Admin list (server-side pagination)
    public function admin()
    {
        $leads = Lead::query()
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin', compact('leads'));
    }

    // “Tracker” logs (pengganti Binom)
    public function trackerLogs()
    {
        $logs = TrackerLog::with('lead:id,name,email')
            ->latest('id')
            ->paginate(50)
            ->withQueryString();

        return view('tracker_logs', compact('logs'));
    }

    // Thank you
    public function thankyou(Request $request)
    {
        $leadId = (int)$request->query('lead_id', 0);
        return view('thankyou', compact('leadId'));
    }

    // Simulasikan conversion (untuk screenshot kedua)
    public function simulateConversion(Request $request)
    {
        $leadId = (int)$request->query('lead_id', 0);
        abort_if($leadId <= 0, 400, 'lead_id required');

        TrackerLog::create([
            'lead_id' => $leadId,
            'event'   => 'conversion',
            'details' => ['note' => 'Simulated conversion'],
        ]);

        return redirect()->route('tracker.logs');
    }
}
