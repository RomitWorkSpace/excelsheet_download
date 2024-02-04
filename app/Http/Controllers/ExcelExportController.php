<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExportController extends Controller
{
    public function exportByDateRange(Request $request)
    {
        // Get start and end date from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Use the query builder to fetch data within the date range
        $data = \DB::table('test')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        // Convert the data to an array
        $dataArray = $data->toArray();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Add column names to the Spreadsheet
        $columns = $this->getColumnNames($dataArray);
        $spreadsheet->getActiveSheet()->fromArray($columns, null, 'A1');

        // Add data to the Spreadsheet, starting from row 2
        $spreadsheet->getActiveSheet()->fromArray($this->formatData($dataArray), null, 'A2');

        // Create a writer and save the file
        $writer = new Xlsx($spreadsheet);

        // Set the headers to force download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="exported_data.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // Helper method to format the data
    private function formatData($data)
    {
        $formattedData = [];
        foreach ($data as $item) {
            $formattedData[] = (array) $item;
        }
        return $formattedData;
    }

    // Helper method to get column names
    private function getColumnNames($data)
    {
        if (empty($data)) {
            return [];
        }

        return array_keys((array) $data[0]);
    }
}
