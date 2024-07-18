<?php

namespace App\Http\Controllers;

use App\Models\ChasResource;
use App\Models\ChssResource;
use App\Models\CiveResource;
use App\Models\CnmsResource;
use App\Models\CoBEResource;
use App\Models\CoEDResource;
use App\Models\CoESEResource;
use Illuminate\Http\Request;


class QrCodeDataController extends Controller
{
    public function index($id)
    {
        if (auth()->user()->college_name === 'College of Informatics and Virtual Education ( CIVE )') {

            $resource = CiveResource::findOrFail($id);

            return view('qr-code-asset-update', compact('resource'));
        }

        elseif (auth()->user()->college_name === 'College of Natural Mathematical Science ( CNMS ) ') {

            $resource = CnmsResource::findOrFail($id);

            return view('qr-code-asset-update', compact('resource'));
        }

        elseif (auth()->user()->college_name === 'College of Health and Allied Science ( CHAS )') {

            $resource = ChasResource::findOrFail($id);

            return view('qr-code-asset-update', compact('resource'));
        }

        elseif (auth()->user()->college_name === 'College of Education ( CoED )') {

            $resource = CoEDResource::findOrFail($id);

            return view('qr-code-asset-update', compact('resource'));
        }

        elseif (auth()->user()->college_name === 'College of Business and Economics ( CoBE )') {

            $resource = CoBEResource::findOrFail($id);

            return view('qr-code-asset-update', compact('resource'));
        }

        elseif (auth()->user()->college_name === 'College of Earth Sciences and Engineering ( CoESE )') {

            $resource = CoESEResource::findOrFail($id);

            return view('qr-code-asset-update', compact('resource'));
        }

        elseif (auth()->user()->college_name === 'College of Humanities and Social Science ( CHSS )') {

            $resource = ChssResource::findOrFail($id);

            return view('qr-code-asset-update', compact('resource'));
        }

        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'resource_name' => ['required', 'string', 'max:255'],
            'resource_status' => ['required', 'string'],

        ]);

        if (auth()->user()->college_name === 'College of Informatics and Virtual Education ( CIVE )') {

            $civeResource = CiveResource::findOrFail($id);

            $civeResource->resource_name = $request->input('resource_name');

            $civeResource->repair_status = $request->input('resource_status');


            $civeResource->update();


            $message = 'Status updated !';
            return back()->with('message', $message);
        }

        elseif (auth()->user()->college_name === 'College of Natural Mathematical Science ( CNMS ) ') {

            $cnmsResource = CnmsResource::findOrFail($id);

            $cnmsResource->resource_name = $request->input('resource_name');

            $cnmsResource->repair_status = $request->input('resource_status');


            $cnmsResource->update();

            $message = 'Status updated !';

            return back()->with('message', $message);
        }

        elseif (auth()->user()->college_name === 'College of Health and Allied Science ( CHAS )') {

            $chasResource = ChasResource::findOrFail($id);

            $chasResource->resource_name = $request->input('resource_name');

            $chasResource->repair_status = $request->input('resource_status');


            $chasResource->update();

            $message = 'Status updated !';
            return back()->with('message', $message);
        }

        elseif (auth()->user()->college_name === 'College of Education ( CoED )') {

            $coEDResource = CoEDResource::findOrFail($id);

            $coEDResource->resource_name = $request->input('resource_name');

            $coEDResource->repair_status = $request->input('resource_status');


            $coEDResource->update();


            $message = 'Status updated !';
            return back()->with('message', $message);
        }

        elseif (auth()->user()->college_name === 'College of Business and Economics ( CoBE )') {

            $coBEResource = CoBEResource::findOrFail($id);

            $coBEResource->resource_name = $request->input('resource_name');

            $coBEResource->repair_status = $request->input('resource_status');


            $coBEResource->update();


            $message = 'Status updated !';
            return back()->with('message', $message);
        }

        elseif (auth()->user()->college_name === 'College of Earth Sciences and Engineering ( CoESE )') {

            $coESEResource = CoESEResource::findOrFail($id);

            $coESEResource->resource_name = $request->input('resource_name');

            $coESEResource->repair_status = $request->input('resource_status');


            $coESEResource->update();


            $message = 'Status updated !';
            return back()->with('message', $message);
        }

        elseif (auth()->user()->college_name === 'College of Humanities and Social Science ( CHSS )') {

            $chssResource = ChssResource::findOrFail($id);

            $chssResource->resource_name = $request->input('resource_name');

            $chssResource->repair_status = $request->input('resource_status');


            $chssResource->update();


            $message = 'Status updated !';
            return back()->with('message', $message);

        }

        else {
            dd('ERROR 404 | NOT FOUND');
        }

    }
}
