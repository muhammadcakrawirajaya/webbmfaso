<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    protected $filteredData;

    public function __construct($filteredData)
    {
        $this->filteredData = $filteredData;
    }

    public function collection()
    {
        return $this->filteredData;
    }

    public function headings(): array
    {
        return [
            'IDS',
            'Tanggal',
            'Bulan',
            'Track ID MYIR',
            'TrackID',
            'Status Duplicate',
            'Nomor SC',
            'Nama Pelanggan',
            'Alamat Pelanggan',
            'CP',
            'Tipe Transaksi',
            'Layanan',
            'Jenis Layanan',
            'Sto' ,
            'Mitra',
            'Team',
            'Kategori',
            'Detail Progres',
            'Kendala',
            'Ket Detail',
            'Chanel',
            'Agency',
            'Label ODP',
            'Label ODP Alternatif',
            'Ket Label ODP',
            'Kap ODP',
            'Port ODP',
            'Sisa Port ODP',
            'Tagging Lokasi ODP',
            'Tagging Lokasi Pelanggan',
            'Status Tagging Pelanggan',
            'ID Valins',
            'Segmen',
            'SO',
            'Telda',
            'Produk',
            'Umur Kendala',
            'Status Kendala',
            'UIC',
            'Feedback PIC',
            'Detail Feedback PIC',
            'Dibuat Oleh',
            'Dibuat Pada',
        ];
    }
}
