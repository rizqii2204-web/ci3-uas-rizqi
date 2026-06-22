<?php
class orders_model extends CI_Model {

    // ambil semua data
    public function get_all()
    {
        $this->db->select('
            orders.*, 
            pelanggan.nama as nama_pelanggan,
            sales.nama as nama_sales,
            SUM(order_detail.jumlah) as total_item
        ');
        $this->db->from('orders');
        $this->db->join('pelanggan', 'pelanggan.id = orders.id_pelanggan');
        $this->db->join('sales', 'sales.id = orders.id_sales', 'left');
        $this->db->join('order_detail', 'order_detail.id_order = orders.id', 'left');
        $this->db->group_by('orders.id');
    
        return $this->db->get()->result();
    }

    // ambil berdasarkan id
    public function get_by_id($id)
    {
        return $this->db->get_where('orders', ['id' => $id])->row();
    }

    // insert data
    public function insert($data)
    {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }

    // update data
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('orders', $data);
    }

    // delete data
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('orders');
    }

    public function update_total($id_order)
    {
        $this->db->select_sum('subtotal');
        $this->db->where('id_order', $id_order);
        $total = $this->db->get('order_detail')->row()->subtotal;
    
        $this->db->where('id', $id_order);
        $this->db->update('orders', [
            'total' => $total
        ]);
    }

    public function get_orders_by_user($user_id)
    {
        $this->db->select('
            orders.*,
            pelanggan.nama AS nama_pelanggan,
            sales.nama AS nama_sales,
            SUM(order_detail.jumlah) as total_item
        ');
    
        $this->db->from('orders');
    
        $this->db->join('pelanggan', 'pelanggan.id = orders.id_pelanggan');
        $this->db->join('sales', 'sales.id = orders.id_sales', 'left');
    
        $this->db->join('order_detail', 'order_detail.id_order = orders.id', 'left');
    
        $this->db->where('orders.user_id', $user_id);
    
        $this->db->group_by('orders.id');
    
        return $this->db->get()->result();
    }


}