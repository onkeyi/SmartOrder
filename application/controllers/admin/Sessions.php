<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * SmartOrder
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2016, SunflowerStudio
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	SmartOrder
 * @author	onkeyi
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://onkeyi.github.io/SmartOrder/
 * @filesource
 */
class Sessions extends MY_Controller
{

    function __construct() {
        parent::__construct();
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
    }

    public function index()
    {
        $this->table();
    }

    public function table()
    {
        $data['areas'] = $this->area_session_model->get_all();
        $this->load->view('admin/session/table_list', $data);
    }

    public function tabledetail($areaId, $sessionId)
    {
        $data['orders'] = $this->order_session_model->get_area_order($areaId, $sessionId);
        $this->load->view('admin/session/table_order', $data);
    }

    public function salelist()
    {

    }


    public function orderlist($offset = 0)
    {
        $this->load->library('pagination');
        $config['base_url'] = '/sessions/orderlist';
        $config['total_rows'] = $this->order_session_model->get_total_count()[0]->count;

        $this->pagination->initialize($this->initPage($config));
        $data['orders'] = $this->order_session_model->get_all($offset, 20);
        $this->load->view('admin/session/order_list', $data);
    }

    function initPage($config)
    {
        $config['per_page'] = 20;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = '最後';
        $config['first_link'] = '最初';
        return $config;
    }

    public function reservation($offset = 0)
    {
        $this->load->library('pagination');
        $config['base_url'] = '/sessions/orderlist';
        $config['total_rows'] = $this->reservation_model->get_all_count();
        $this->pagination->initialize($this->initPage($config));
        $data['reservation'] = $this->reservation_model->get_all($offset, 20);
        $this->load->view('admin/session/reservation_list', $data);
    }


    public function reservationreg($reservationNo = NULL)
    {
        $data['reservation_id'] = '';
        $data['reservation_date'] = '';
        $data['reservation_area_id'] = '';
        $data['reservation_menu_id'] = '';
        $data['reservation_number'] = 0;
        $data['reservation_memo'] = '';
        $data['menus'] = $this->menu_model->get_all();
        $data['areas'] = $this->area_model->get_all();

        if (isset($reservationNo)) {
            $result = $this->reservation_model->get_by_reservation_id($reservationNo);
            foreach ($result as $r) {
                $data['reservation_id'] = $r->reservation_id;
                $data['reservation_date'] = $r->reservation_date;
                $data['reservation_area_id'] = $r->reservation_area_id;
                $data['reservation_menu_id'] = $r->reservation_menu_id;
                $data['reservation_number'] = $r->reservation_number;
                $data['reservation_memo'] = $r->reservation_memo;
            }
        }
        $this->load->view('admin/session/reservation_reg', $data);
    }
}
