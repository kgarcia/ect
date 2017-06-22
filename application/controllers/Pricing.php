<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        //$this->load->model(array('Period_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
    }
    function index()
    {

        $data['title'] = 'Pricing';    
        $data['active'] = 'pricing';

        $this->load->view('front/header_view', $data);
        //$this->load->view('front/nav_view', $data);
        $this->load->view('front/pricing_view', $data);
        $this->load->view('front/footer_view', $data); 
        

    }






}