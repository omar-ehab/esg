<?php

namespace App\Exports;

use App\Models\ContactUsMessage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ContactUsMessagesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return ContactUsMessage::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Company',
            'Country',
            'Message',
            'Sent At',
        ];
    }

    /**
     * @return array
     * @var ContactUsMessage $row
     */
    public function map($row): array
    {
        return [
            $row->first_name,
            $row->last_name,
            $row->email,
            $row->phone,
            $row->company,
            $row->country,
            $row->message,
            Date::dateTimeToExcel($row->created_at),
        ];
    }
}
