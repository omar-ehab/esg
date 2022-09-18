<?php

namespace App\Exports;

use App\Models\Inquiry;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InquiriesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Inquiry::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'Full Name',
            'Mobile',
            'Email',
            'Company',
            'Service',
            'Country',
            'Message',
            'Sent At',
        ];
    }

    /**
     * @return array
     * @var Inquiry $row
     */
    public function map($row): array
    {
        return [
            $row->name,
            $row->mobile,
            $row->email,
            $row->company,
            $row->service,
            $row->country->name,
            $row->message,
            Date::dateTimeToExcel($row->created_at),
        ];
    }
}
