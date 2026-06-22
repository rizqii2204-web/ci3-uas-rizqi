<?php
class laporan_model extends CI_Model
{
    public function get_laporan($awal, $akhir)
    {
        $this->db->select('orders.tanggal, orders.total, sales.nama as nama_sales');
        $this->db->from('orders');
        $this->db->join('sales', 'sales.id = orders.id_sales', 'left');

        if (!empty($awal) && !empty($akhir)) {
            $this->db->where('orders.tanggal >=', $awal);
            $this->db->where('orders.tanggal <=', $akhir);
        }

        return $this->db->get()->result();
    }

    public function get_total($awal = null, $akhir = null)
    {
        if ($awal && $akhir) {
            $this->db->where('tanggal >=', $awal);
            $this->db->where('tanggal <=', $akhir);
        }

        return $this->db->select_sum('total')->get('orders')->row()->total;
    }

    public function laporan_per_sales($awal = null, $akhir = null)
    {
        $this->db->select('sales.id, sales.nama, SUM(orders.total) as total');
        $this->db->from('orders');
        $this->db->join('sales', 'sales.id = orders.id_sales');
    
        if ($awal && $akhir) {
            $this->db->where('orders.tanggal >=', $awal);
            $this->db->where('orders.tanggal <=', $akhir);
        }
    
        $this->db->group_by('sales.id');
    
        return $this->db->get()->result();
    }

    public function laporan_per_produk($awal = null, $akhir = null)
    {
        $this->db->select('
            produk.nama_produk, 
            SUM(order_detail.jumlah) as qty,
            SUM(order_detail.jumlah * order_detail.harga) as total
        ');
        $this->db->from('order_detail');
        $this->db->join('produk', 'produk.id = order_detail.id_produk');
        $this->db->join('orders', 'orders.id = order_detail.id_order');

        if ($awal && $akhir) {
            $this->db->where('orders.tanggal >=', $awal);
            $this->db->where('orders.tanggal <=', $akhir);
        }

        $this->db->group_by('order_detail.id_produk');

        return $this->db->get()->result();
    }
}