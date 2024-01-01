<?php

defined('BASEPATH') or exit('No direct script access allowed');

class V1 extends CI_Controller
{

    public function map()
    {

        $data = array(
            'judul' => 'WebGIS Training',
            'content' => 'peta_leaflet'
        );

        $this->load->view('layout/viewunion', $data, FALSE);
    }
    public function index()
    {
        $data = array(

            'judul' => 'WebGIS Training',
            'content' => 'articles'

        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }
    public function gallery()
    {
        $data = array(

            'judul' => 'WebGIS Training',
            'content' => 'gallery_articles'

        );
        $this->load->view('layout/viewunion', $data);
    }
    public function about()
    {
        $data = array(

            'judul' => 'WebGIS Training',
            'content' => 'about_articles'

        );
        $this->load->view('layout/viewunion', $data);
    }
}

/* End of file Home.php */