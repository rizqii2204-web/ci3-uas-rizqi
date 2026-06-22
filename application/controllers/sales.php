<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        if ($this->session->userdata('role') != 'sales') {
            redirect('auth');
        }

        $this->load->model('orders_model');
        $this->load->model('pelanggan_model');
    }

    // ================= DASHBOARD =================
    public function index()
    {
        $user_id = $this->session->userdata('id');
    
        // data sales
        $this->db->where('id', $user_id);
        $data['sales'] = $this->db->get('sales')->row();
    
        // total order
        $data['total_orders'] = $this->db
            ->where('user_id', $user_id)
            ->count_all_results('orders');
    
        // total penjualan
        $data['total_penjualan'] = $this->db
            ->select_sum('total')
            ->where('user_id', $user_id)
            ->get('orders')
            ->row()
            ->total;
    
        // order hari ini
        $data['order_hari_ini'] = $this->db
            ->where('user_id', $user_id)
            ->where('tanggal', date('Y-m-d'))
            ->count_all_results('orders');
    
        $data['title'] = 'Dashboard Sales';
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/dashboard', $data);
        $this->load->view('templates/footer');
    }

    // ================= ORDERS =================
    public function orders()
    {
        $user_id = $this->session->userdata('id');
        $data['orders'] = $this->orders_model->get_orders_by_user($user_id);

        $data['title'] = 'Orders Saya';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/orders/index', $data);
        $this->load->view('templates/footer');
    }

    // ================= TAMBAH ORDER =================
    public function tambah_orders()
    {
        $this->session->userdata('id');
        $this->load->model('produk_model');
    
        $data['pelanggan'] = $this->pelanggan_model->get_all();
        $data['produk'] = $this->produk_model->get_all();
        $data['title'] = 'Tambah Orders';
    
        if ($this->input->post()) {
    
            $data_insert = [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'tanggal'      => $this->input->post('tanggal'),
                'status'       => $this->input->post('status'),
    
                'id_sales'     => $this->session->userdata('id'),
                'user_id'      => $this->session->userdata('id'),
    
                'total'        => 0
            ];
    
            
            $this->db->insert('orders', $data_insert);
    
            redirect('sales/orders');
        }
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/orders/tambah', $data);
        $this->load->view('templates/footer');
    }

    // ================= EDIT STATUS =================
    public function update_status($id)
    {
        $status = $this->input->post('status');

        $this->orders_model->update($id, [
            'status' => $status
        ]);

        redirect('sales/orders');
    }

    // ================= DETAIL =================
    public function detail_orders($id)
    {
        $this->load->model('orders_detail_model');
        $this->load->model('produk_model');

        $data['order'] = $this->orders_model->get_by_id($id);
        $data['detail'] = $this->orders_detail_model->get_by_order($id);
        $data['produk'] = $this->produk_model->get_all();
        $data['title'] = 'Detail Orders';

        if (!$data['order']) {
            show_404();
        }

        if ($data['order']->user_id != $this->session->userdata('id')) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/orders/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit_orders($id)
    {
        $data['order'] = $this->db->get_where('orders', ['id' => $id])->row();
        $data['title'] = 'Edit Orders';

        if (!$data['order']) {
            show_404();
        }

        // SECURITY
        if ($data['order']->user_id != $this->session->userdata('id')) {
            show_404();
        }
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/orders/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update_orders()
    {
        $id = $this->input->post('id');


        $order = $this->db->get_where('orders', ['id' => $id])->row();

        //  SECURITY
        if (!$order || $order->user_id != $this->session->userdata('id')) {
            show_404();
        }
    

        $data = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'tanggal'      => $this->input->post('tanggal'),
            'status'       => $this->input->post('status'),
        ];
    
        $this->db->where('id', $id);
        $this->db->update('orders', $data);
    
        redirect('sales/orders');
    }

    // ================= DETAIL ITEM =================
    public function tambah_detail($id_order)
    {
        $order = $this->orders_model->get_by_id($id_order);

        if (!$order || $order->user_id != $this->session->userdata('id')) {
            show_404();
        }

        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');
    
        $produk = $this->db->get_where('produk', ['id' => $id_produk])->row();
    
        $data = [
            'id_order' => $id_order,
            'id_produk' => $id_produk,
            'jumlah' => $jumlah,
            'harga' => $produk->harga,
            'subtotal' => $produk->harga * $jumlah
        ];
    
        $this->db->insert('order_detail', $data);
    
        $this->update_total($id_order);
    
        redirect('sales/detail_orders/'.$id_order);
    }

    public function update_detail($id_detail, $id_order)
    {
        $jumlah = (int) $this->input->post('jumlah');
    
        $detail = $this->db->get_where('order_detail', ['id' => $id_detail])->row(); // 🔥 FIX
    
        if (!$detail) {
            show_404();
        }
    
        $subtotal = $detail->harga * $jumlah;
    
        $this->db->where('id', $id_detail);
        $this->db->update('order_detail', [ 
            'jumlah' => $jumlah,
            'subtotal' => $subtotal
        ]);
    
        $this->update_total($id_order);
    
        redirect('sales/detail_orders/'.$id_order);
    }

    public function hapus_detail($id_detail, $id_order)
    {
        $this->db->where('id', $id_detail);
        $this->db->delete('order_detail'); // 
    
        $this->update_total($id_order);
    
        redirect('sales/detail_orders/'.$id_order);
    }

    private function update_total($id_order)
    {
        $total = $this->db
            ->select_sum('subtotal')
            ->where('id_order', $id_order)
            ->get('order_detail') // 
            ->row()
            ->subtotal;
    
        $this->db->where('id', $id_order);
        $this->db->update('orders', [
            'total' => $total ? $total : 0
        ]);
    }

    public function batalkan_order($id)
    {
        $order = $this->orders_model->get_by_id($id);
    
        if (!$order || $order->user_id != $this->session->userdata('id')) {
            show_404();
        }
    
        $this->orders_model->update($id, [
            'status' => 'dibatalkan'
        ]);
    
        redirect('sales/orders');
    }

}