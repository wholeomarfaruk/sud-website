<?php

namespace App\Exports;

use App\Models\Inquiry;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class InquiryExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithTitle
{
    public function __construct(
        private string $search = '',
        private string $status = '',
        private string $source = '',
        private string $dateFrom = '',
        private string $dateTo = '',
    ) {}

    public function query()
    {
        return Inquiry::query()
            ->when($this->search, fn($q) => $q->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            }))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->source, fn($q) => $q->where('source_page', $this->source))
            ->when($this->dateFrom, fn($q) => $q->whereDate('created_at', '>=', $this->dateFrom))
            ->when($this->dateTo, fn($q) => $q->whereDate('created_at', '<=', $this->dateTo))
            ->latest();
    }

    public function headings(): array
    {
        return ['#', 'Name', 'Email', 'Phone', 'Subject', 'Message', 'Source Page', 'Status', 'Received At'];
    }

    public function map($inquiry): array
    {
        return [
            $inquiry->id,
            $inquiry->name,
            $inquiry->email,
            $inquiry->phone,
            $inquiry->subject,
            $inquiry->message,
            $inquiry->source_page,
            strtoupper($inquiry->status),
            $inquiry->created_at->format('d-m-Y h:i A'),
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font'    => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                'fill'    => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF1E3A5F']],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }

    public function title(): string
    {
        return 'Inquiries';
    }
}
