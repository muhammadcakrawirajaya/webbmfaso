<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class OrderImport implements ToCollection, WithHeadingRow
{
    public $data;

    public function collection(Collection $rows)
    {
        $this->data = $rows->map(function ($row) {
            return [
                'tanggal' => is_numeric($row['tanggal'])
                    ? Carbon::instance(Date::excelToDateTimeObject($row['tanggal']))->format('d-m-Y')
                    : $row['tanggal'],
                'bulan' => $row['bulan'] ?? null,
                'chanel' => $row['chanel'] ?? null,
                'agency' => $row['agency'] ?? null,
                'track_id_myir' => $row['track_id_myir'] ?? null,
                'trackid' => $row['trackid'] ?? null,
                'status_duplicate' => $row['status_duplicate'] ?? null,
                'nomor_sc' => $row['nomor_sc'] ?? null,
                'nama_pelanggan' => $row['nama_pelanggan'] ?? null,
                'alamat_pelanggan' => $row['alamat_pelanggan'] ?? null,
                'cp' => $row['cp'] ?? null,
                'tipe_transaksi' => $row['tipe_transaksi'] ?? null,
                'layanan' => $row['layanan'] ?? null,
                'jenis_layanan' => $row['jenis_layanan'] ?? null,
                'sto' => $row['sto'] ?? null,
                'mitra' => $row['mitra'] ?? null,
                'team' => $row['team'] ?? null,
                'kategori' => $row['kategori'] ?? null,
                'detail_progres' => $row['detail_progres'] ?? null,
                'kendala' => $row['kendala'] ?? null,
                'ket_detail' => $row['ket_detail'] ?? null,
                'label_odp' => $row['label_odp'] ?? null,
                'label_odp_alternatif' => $row['label_odp_alternatif'] ?? null,
                'ket_label_odp' => $row['ket_label_odp'] ?? null,
                'kap_odp' => $row['kap_odp'] ?? null,
                'port_odp' => $row['port_odp'] ?? null,
                'sisa_port_odp' => $row['sisa_port_odp'] ?? null,
                'tagging_lokasi_odp' => $row['tagging_lokasi_odp'] ?? null,
                'tagging_lokasi_pelanggan' => $row['tagging_lokasi_pelanggan'] ?? null,
                'status_tagging_pelanggan' => $row['status_tagging_pelanggan'] ?? null,
                'id_valins' => $row['id_valins'] ?? null,
                'segmen' => $row['segmen'] ?? null,
                'produk' => $row['produk'] ?? null,
                'feedback_pic' => $row['feedback_pic'] ?? null,
                'detail_feedback_pic' => $row['detail_feedback_pic'] ?? null,
                'rab_sdi' => $row['rab_sdi'] ?? null,
                'rab_aanwijzing' => $row['rab_aanwijzing'] ?? null,
                'bges_mbb_approval' => $row['bges_mbb_approval'] ?? null,
                'bges_mbb_note' => $row['bges_mbb_note'] ?? null,
            ];
        });
    }

    public function getData()
    {
        return $this->data;
    }
}
