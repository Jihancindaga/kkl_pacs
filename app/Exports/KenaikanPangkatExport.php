<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KenaikanPangkatExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Return the array that will be exported.
     *
     * @return array
     */
    public function array(): array
    {
        $exportData = [];

        // Combine all the data from different tables (e.g., KPO, Struktural, etc.)
        foreach (['kpo', 'struktural', 'penyesuaianIjazah', 'fungsional', 'tugasBelajar'] as $table) {
            foreach ($this->data[$table] as $item) {
                // Customize each row based on the columns you want in the export
                $exportData[] = [
                    'No' => $item->id, // Assuming there's an 'id' field for numbering
                    'NIP' => $item->karyawan->nip ?? '',
                    'Nama' => $item->karyawan->nama ?? '',
                    'Tahun Pengajuan' => $item->tahun_pengajuan ?? '',
                    'Kategori' => class_basename($item), // Get the model's name for category (KPO, Struktural, etc.)
                    'Bagian' => $item->karyawan->bagian ?? '',
                    'Pangkat Terakhir' => $item->karyawan->pangkat_terakhir ?? '', // Assuming you have this attribute
                    'Pangkat yang Diajukan' => $item->pangkat ?? '',
                ];
            }
        }

        return $exportData;
    }

    /**
     * Return the headings for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'NIP',
            'Nama',
            'Tahun Pengajuan',
            'Kategori',
            'Bagian',
            'Pangkat Terakhir',
            'Pangkat yang Diajukan',
        ];
    }
}


