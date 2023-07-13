<?php

namespace App\Repositories;

use App\Repositories\Contracts\ReportRepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ReportRepository implements ReportRepositoryInterface
{
    public function getRekapBarang(): Builder
    {
        $sql = "
      select b.id, b.nama as nama_barang, sum(
      	case when t.jenis_transaksi = 'pembelian' 
      	then t.harga
      	else 0 end 
      ) harga_pembelian,
      sum(
      	case when t.jenis_transaksi = 'penjualan' 
      	then t.harga
      	else 0 end 
      ) harga_penjualan,
      sum(
      	case when t.jenis_transaksi = 'penjualan' 
      	then t.jumlah * t.harga
      	else 0 end 
      ) total_penjualan,
      sum(
      	case when t.jenis_transaksi = 'pembelian' 
      	then t.jumlah
      	else 0 end 
      ) jumlah_pembelian,
      sum(
      	case when t.jenis_transaksi = 'penjualan' 
      	then t.jumlah
      	else 0 end 
      ) jumlah_penjualan,
      sum(
      	case when t.jenis_transaksi = 'pembelian' 
      	then t.harga * t.jumlah
      	else 0 end 
      ) total_pembelian,
      sum(
        case when t.jenis_transaksi = 'penjualan'
        then (t.harga * t.jumlah)
        when t.jenis_transaksi = 'pembelian'
        then -(t.harga * t.jumlah)
        end
      ) total_selisih
      from barang b
      left join transaksi t on t.barang_id = b.id
      group by b.id, b.nama
      order by b.nama
    ";

        return DB::table(DB::raw('('.$sql.') as foo'));
    }
}
