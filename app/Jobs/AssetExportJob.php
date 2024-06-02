<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Barryvdh\DomPDF\Facade\Pdf;

class AssetExportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(

        public $assets
    )
    {
        //
    }

    /**
     * Execute the job.
     */

    public function handle(): void
    {
        $assets = [];

        foreach ($this->assets as $asset) {

           $assets[] = [

                'asset' => $asset,
           ];

         }


        $fileName = uniqid('UDOM-asset-costs-' . time(), true) . '.pdf';

        $path = public_path('storage/asset_cost_files/' . $fileName);

        
        $pdf = Pdf::loadView('UDOM-asset-costs-pdf', ['assets' =>  $assets]);


        $pdf->save($path);
    }
}
