<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingListRequest;
use App\Http\Requests\StoreChargeRequest;
use App\Http\Requests\UpdateChargeRequest;
use App\Importer\ChargeImporter;
use App\Jobs\SendNotificationJob;
use App\Jobs\SendNotificationJobBatch;
use App\Models\Charge;
use Illuminate\Http\JsonResponse;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Charge::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChargeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Charge $charge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Charge $charge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChargeRequest $request, Charge $charge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Charge $charge)
    {
        //
    }

    public function upload_native(BillingListRequest $request): JsonResponse | \Exception
    {
        if ($request->hasFile('billing_list') && $request->file('billing_list')->isValid()) {
            $handle = fopen($request->file('billing_list')->path(), 'rb');
            if (!$handle) {
                throw new \Exception("It is not possible reading file");
            }

            $batchSize = 100;
            $batch = [];

            while (($row = fgetcsv($handle)) !== false) {
                $batch[] = $row;

                if (count($batch) >= $batchSize) {
                    SendNotificationJob::dispatch($batch);
                    $batch = [];
                }
            }

            if (count($batch) > 0) {
                SendNotificationJob::dispatch($batch);
            }

            fclose($handle);
        }

        Charge::create([
            'user_id' => $request->user_id,
            'file_name' => $request->file('billing_list')->getClientOriginalName()
        ]);

        return response()->json(["sent" => "upload completed successfully"]);
    }

    public function upload_lib(BillingListRequest $request): JsonResponse | \Exception
    {
        if(!$request->hasFile('billing_list') || !$request->file('billing_list')->isValid()) {
            throw new \Exception("It is not possible reading file");
        }

        \Excel::queueImport(new ChargeImporter(), $request->file('billing_list'));

        Charge::create([
            'user_id' => $request->user_id,
            'file_name' => $request->file('billing_list')->getClientOriginalName()
        ]);

        return response()->json(["sent" => "upload completed successfully"]);
    }
}

