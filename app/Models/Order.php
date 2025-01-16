<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $guarded = ['id'];

    protected $fillable = [
        'tanggal',
        'bulan',
        'chanel',
        'segmen',
        'agency',
        'track_id_myir',
        'trackid',
        'status_duplicate',
        'nomor_sc',
        'nama_pelanggan',
        'alamat_pelanggan',
        'cp',
        'tipe_transaksi',
        'layanan',
        'jenis_layanan',
        'id_sto',
        'mitra',
        'produk',
        'team',
        'kategori',
        'detail_progres',
        'kendala',
        'ket_detail',
        'label_odp',
        'label_odp_alternatif',
        'ket_label_odp',
        'kap_odp',
        'port_odp',
        'sisa_port_odp',
        'tagging_lokasi_odp',
        'tagging_lokasi_pelanggan',
        'status_tagging_pelanggan',
        'id_valins',
        'id_feedback',
        'ket_feedback',
        'rab_sdi',
        'rab_aanwijzing',
        'bges_mbb_approval',
        'bges_mbb_note',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function feedback_order()
    {
        return $this->belongsTo(FeedbackPIC::class, 'id_feedback', 'id');
    }

    public function order_sto()
    {
        return $this->belongsTo(Sto::class, 'id_sto', 'id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(Karyawan::class, 'created_by', 'id');
    }
}
