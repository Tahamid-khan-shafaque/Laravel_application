<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use TCPDF;
use Illuminate\Http\Response;
class FormController extends Controller
{
    public function submit(Request $request)
    {

         // Validate the form data
         $request->validate([
            'photo' => 'image|max:2048', // Maximum file size of 2MB (2048 kilobytes)
        ]);
        // Retrieve form data
        $name = $request->input('name');
        $email = $request->input('email');
        $number = $request->input('number');
        $department = $request->input('department');
        $bloodgroup = $request->input('bloodgroup');
        $gender = $request->input('gender');
        $skillset = $request->input('skillset');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->move('photos', $photo->getClientOriginalName());
        } else {
            $photoPath = null;
        }

        // Save the form data to the database
        DB::table('form_data')->insert([
            'name' => $name,
            'email' => $email,
            'number' => $number,
            'department' => $department,
            'bloodgroup' => $bloodgroup,
            'gender' => $gender,
            'skillset' => $skillset,
            'photo' => $photoPath, 
        ]);

        
        return redirect()->route('success');
    }

    public function displayData($id = null)
    {
        if ($id) {
           
            $formData = Form::find($id);
        } else {
          
            $formData = DB::table('form_data')->get();
        }

      
        return view('data-display', compact('formData'));
    }
    public function viewForm($id)
    {
        
        $formData = DB::table('form_data')->where('id', $id)->first();
    
       
        return view('view', compact('formData'));
    }

    //download
    public function download($id = null)
{
    $formData = DB::table('form_data')->where('id', $id)->first();
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('times', '', 12);
    $imageX = ($pdf->getPageWidth() - 40) / 2;
    $imageY = 50;
    if (!empty($formData->photo)) {
        $imagePath = public_path('storage/subdirectory/' . $formData->photo);
        $pdf->Image($imagePath, $imageX, $imageY, 40, 0, '', '', '', false, 300, '', false, false, 0);
    }
    $tableX = 15;
    $tableY = $imageY + 30;

    $tableData = [
        ['Attribute', 'Value'],
        ['ID', $formData->id],
        ['Name', $formData->name],
        ['Email', $formData->email],
        ['Number', $formData->number],
        ['Department', $formData->department],
        ['Blood Group', $formData->bloodgroup],
        ['Gender', $formData->gender],
        ['Skillset', $formData->skillset],
        ['Photo', $formData->photo],
    ];

    $tableWidths = [50, 140];

    $tableHeight = count($tableData) * 10;

    $tableY = ($pdf->getPageHeight() - $tableHeight) / 2;

    $pdf->SetFont('times', 'B', 16);
    $pdf->SetTextColor(0, 51, 102);
    $pdf->SetXY($tableX, 15);
    $pdf->Cell(0, 10, 'USER INFORMATION', 0, 1, 'C');

    $pdf->SetFont('times', '', 12);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetFillColor(0, 51, 102);
    $pdf->SetTextColor(255, 255, 255);

    $isHeader = true;
    foreach ($tableData as $row) {
        $pdf->SetXY($tableX, $tableY);

        if (in_array($row[0], ['ID', 'Email', 'Department', 'Gender'])) {
            $pdf->SetFillColor(0, 128, 0);
        } else {
            $pdf->SetFillColor(0, 51, 102);
        }
        $pdf->Cell($tableWidths[0], 10, $row[0], 1, 0, 'L', 1);
        $pdf->Cell($tableWidths[1], 10, $row[1], 1, 1, 'L', 1);
        $tableY += 10;
        $isHeader = !$isHeader;
    }

    $pdfContent = $pdf->Output('', 'S');

    $response = new Response($pdfContent);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'attachment;filename=user_info.pdf');
    $response->header('Content-Length', strlen($pdfContent));
    $response->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    $response->header('Pragma', 'no-cache');
    $response->header('Expires', '0');

    return $response;
}
}