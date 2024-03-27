<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResourceAllocationToCollege;
use Livewire\WithPagination;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class ViewCollegeAllocationsLivewire extends Component
{

    public $resourceSearch = '';

    use WithPagination;


    public function render()
    {

        if ( auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )') {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Informatics and Virtual Education ( CIVE )')->paginate(15)]);

        } elseif ( auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Natural Mathematical Science ( CNMS ) ')->paginate(15)]);

        } elseif ( auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Health and Allied Science ( CHAS )')->paginate(15)]);

        } elseif ( auth()->user()->college_name == 'College of Education ( CoED )') {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Education ( CoED )')->paginate(15)]);

        } elseif ( auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Humanities and Social Science ( CHSS )')->paginate(15)]);

        } elseif ( auth()->user()->college_name == 'College of Business and Economics ( CoBE )') {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Business and Economics ( CoBE )')->paginate(15)]);

        } elseif ( auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )') {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Earth Sciences and Engineering ( CoESE )')->paginate(15)]);

        }

        else {

            return view('livewire.view-college-allocations-livewire', ['Resources' => ResourceAllocationToCollege::search($this->resourceSearch)->with(['assets', 'user'])->paginate(15)]);

        }


    }

    public function exportResourcesPdf()
    {

        // PDF file for CIVE

        if (auth()->user()->role_id == 2 && auth()->user()->college_name = 'College of Informatics and Virtual Education ( CIVE )') {

            $Resources = [];

            $data = ResourceAllocationToCollege::with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Informatics and Virtual Education ( CIVE )')->get();

            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );
        }

        // End of PDF file for CIVE

        // ------------------------------------------------------------------------------------------------------------

        // PDF file for CNMS

        elseif (auth()->user()->role_id == 2 && auth()->user()->college_name = 'College of Natural Mathematical Science ( CNMS )') {
            $Resources = [];
            $data = ResourceAllocationToCollege::with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Natural Mathematical Science ( CNMS )')->get();
            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );
        }

        // End of PDF file for CNMS

        // ---------------------------------------------------------------------------------------------------------------

        // PDF file for CHAS

        elseif (auth()->user()->role_id == 2 && auth()->user()->college_name = 'College of Health and Allied Science ( CHAS )') {
            $Resources = [];
            $data = ResourceAllocationToCollege::with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Health and Allied Science ( CHAS )')->get();
            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );
        }

        // End of PDF file for CHAS

        // --------------------------------------------------------------------------------------------------------------------

        // PDF file for CoED

        elseif (auth()->user()->role_id == 2 && auth()->user()->college_name = 'College of Health and Allied Science ( CHAS )') {
            $Resources = [];
            $data = ResourceAllocationToCollege::with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Health and Allied Science ( CHAS )')->get();
            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );
        }

        // End of PDF file for CoED

        // -------------------------------------------------------------------------------------------------------------------

        // PDF file for CHSS

        elseif (auth()->user()->role_id == 2 && auth()->user()->college_name = 'College of Humanities and Social Science ( CHSS )') {
            $Resources = [];
            $data = ResourceAllocationToCollege::with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Humanities and Social Science ( CHSS )')->get();
            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );
        }

        // End of PDF file for CHSS

        // ----------------------------------------------------------------------------------------------------------------

        // PDF file for CoBE

        elseif (auth()->user()->role_id == 2 && auth()->user()->college_name = 'College of Business and Economics ( CoBE )') {
            $Resources = [];
            $data = ResourceAllocationToCollege::with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Business and Economics ( CoBE )')->get();
            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );
        }

        // End of PDF file for CoBE

        // -------------------------------------------------------------------------------------------------------------

        // PDF file for CoESE

        elseif (auth()->user()->role_id == 2 && auth()->user()->college_name = 'College of Earth Sciences and Engineering ( CoESE )') {
            $Resources = [];
            $data = ResourceAllocationToCollege::with(['assets', 'user'])->where('resource_allocated_college', '=', 'College of Earth Sciences and Engineering ( CoESE )')->get();
            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );
        }

        // End of PDF file for CoESE

        // --------------------------------------------------------------------------------------------------------------------

        // PDF file for assistant

        elseif(auth()->user()->role_id == 1 && auth()->user()->college_name == 'Not set') {

            $Resources = [];

            $data = ResourceAllocationToCollege::with(['assets', 'user'])->get();

            foreach ($data as $item) {

                $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . Hash::make($item->id) . '-' . 'assets' . '-' . 'to' . '-' . 'colleges');
                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("items-allocated-to-colleges", [
                'Resources' => $Resources
            ]);


            $pdfOutput = $pdf->output();

            return response()->stream(
                function () use ($pdfOutput) {
                    echo $pdfOutput;
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename=UDOM-assets-to-colleges.pdf'
                ]
            );

            // End of PDF file for assistant

            // --------------------------------------------------------------------------------------------------------------------------

        }


    }

    private function generateQRCode($data): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle(100),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);

        return 'data:image/svg+xml;base64,' . base64_encode($writer->writeString($data));
    }

    public function deleteResources($id)
    {
        $delete_resource = ResourceAllocationToCollege::where("id", $id)->exists() ? ResourceAllocationToCollege::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully.');
        
    }
}
