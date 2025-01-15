<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class CheckImport implements ToCollection, WithHeadingRow
{
    public $data;

    public function collection(Collection $rows)
    {
        $this->data = $rows->map(function ($row) {
            return [
                'order_id' => $row['order_id'] ?? null,
                'sto' => $row['sto'] ?? null,
                'order_date' => is_numeric($row['order_date'])
                    ? Carbon::instance(Date::excelToDateTimeObject($row['order_date']))->format('d-m-Y')
                    : $row['order_date'],
                'customer_name' => $row['customer_name'] ?? null,
                'status_resume' => $row['status_resume'] ?? null,
            ];
        });
    }

    public function getData()
    {
        return $this->data;
    }
}
