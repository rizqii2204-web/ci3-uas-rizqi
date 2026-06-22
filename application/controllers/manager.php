<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manager extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('laporan_model');

        // cek login
        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        // cek role
        if ($this->session->userdata('role') != 'manager') {
            redirect('auth');
        }
    }

    public function index()
    {
        redirect('manager/dashboard');
    }

    public function dashboard()
    {
        $data['total_omzet'] = $this->laporan_model->get_total();
        
        $data['total_transaksi'] = $this->db->count_all('orders');
    
        $data['total_sales'] = $this->db
            ->where('role', 'sales')
            ->from('users')
            ->count_all_results();
    
        // ambil grafik (SUDAH FORMAT 12 BULAN)
        $grafik = $this->laporan_model->get_penjualan_per_bulan();
    
        $data['bulan'] = $grafik['bulan'];
        $data['total_per_bulan'] = $grafik['total'];
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manager/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_periode()
    {
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
    
        $data['laporan'] = $this->laporan_model->get_laporan($awal, $akhir);
        $data['total']   = $this->laporan_model->get_total($awal, $akhir) ?? 0;
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manager/laporan/laporan_periode', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_sales()
    {
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
    
        $data['laporan_sales'] = $this->laporan_model->laporan_per_sales($awal, $akhir);
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manager/laporan/laporan_sales', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_produk()
    {
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
    
        $data['laporan_produk'] = $this->laporan_model->laporan_per_produk($awal, $akhir);
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manager/laporan/laporan_produk', $data);
        $this->load->view('templates/footer');
    }
    

    public function export_pdf_periode()
    {
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
    
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    
        $options = new Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        $dompdf = new Dompdf\Dompdf($options);
    
        $data['laporan'] = $this->laporan_model->get_laporan($awal, $akhir);
        $data['total']   = $this->laporan_model->get_total($awal, $akhir) ?? 0;
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
    
        $html = $this->load->view('manager/pdf/laporan_periode_pdf', $data, true);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $dompdf->stream("laporan_periode.pdf", array("Attachment" => false));
    }

    public function export_pdf_sales()
    {
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
    
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    
        $options = new Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        $dompdf = new Dompdf\Dompdf($options);
    
        $data['laporan_sales'] = $this->laporan_model->laporan_per_sales($awal, $akhir);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
    
        $html = $this->load->view('manager/pdf/laporan_sales_pdf', $data, true);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $dompdf->stream("laporan_sales.pdf", array("Attachment" => false));
    }

    public function export_pdf_produk()
    {
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
    
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    
        $options = new Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        $dompdf = new Dompdf\Dompdf($options);
    
        $data['laporan_produk'] = $this->laporan_model->laporan_per_produk($awal, $akhir);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
    
        $html = $this->load->view('manager/pdf/laporan_produk_pdf', $data, true);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $dompdf->stream("laporan_produk.pdf", array("Attachment" => false));
    }


}