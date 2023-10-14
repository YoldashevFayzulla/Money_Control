<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
use function Symfony\Component\Translation\t;

class PDFController extends Controller
{
    public function generatePDF()
    {

        //        dd('s');

        $today = now()->toDateString();

        // Fetch your table data here (e.g., from a database)



//        $tableData = Order::whereDate('created_at', '=', $today)->get();



        $tableData = Order::all();

        // Generate the PDF
        $pdf = PDF::loadView('pdf.pdf', ['orders' => $tableData]);

        // Optionally, you can customize the PDF settings here, e.g., set paper size, orientation, etc.

        // Download the PDF or display it in the browser
            return $pdf->download('orders.pdf');
    }

}
