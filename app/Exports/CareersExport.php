<?php

namespace App\Exports;

use App\Models\Career;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\Hyperlink;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CareersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Career::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Phone',
            'National Id',
            'Job Title',
            'CV',
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
            $row->phone,
            $row->national_id,
            $row->job->name,
            Hyperlink::set(asset('storage/' . $row->cv_path)),
            Date::dateTimeToExcel($row->created_at),
        ];
    }
}
