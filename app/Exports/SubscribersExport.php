<?php

namespace App\Exports;

use App\Models\Subscriber;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class SubscribersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Subscriber::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'Email',
            'Subscription Date',
        ];
    }

    /**
     * @return array
     * @var Subscriber $subscriber
     */
    public function map($row): array
    {
        return [
            $row->email,
            Date::dateTimeToExcel($row->created_at),
        ];
    }
}
