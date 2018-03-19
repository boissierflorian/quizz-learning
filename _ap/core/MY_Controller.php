<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base_Controller Class
 *
 * This class contains basic controller behavior such as handling
 * user sessions, default views, etc.
 *
 */
class Base_Controller extends CI_Controller {
    /**
     * Shared data among controllers.
     *
     * @var array
     */
    protected $data = array();

    /**
     * Shared errors among controllers.
     *
     * @var array
     */
    protected $errors = array();

    /**
     * Base_Controller constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->data = array();
        $this->data['title'] = 'Quizz Learning';
        $this->errors = array();

        $this->load->driver('cache');
        $this->load->helper('url_helper');
    }

    /**
     * Rendering method.
     */
    public function render()
    {
        if (! isset($this->data['pagetitle']))
            $this->data['pagetitle'] = $this->data['title'];


        $this->data['home_label'] = $this->data['title'];

        // TODO menubar
        $navbar_links = $this->config->item('navbar_links');
        foreach ($navbar_links as &$navbar_item) {
            $navbar_item['link'] = base_url($navbar_item['link']);
        }

        $this->data['navbar_links'] = $navbar_links;
        $this->data['navbar'] = $this->parser->parse('templates/navbar', $this->data, true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['footer'] = $this->parser->parse('templates/footer', $this->data, true);
        // TODO footer

        $this->data['data'] = &$this->data;
        $this->parser->parse('templates/base', $this->data);
    }
}