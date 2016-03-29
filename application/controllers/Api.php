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

defined('API_SUCCESS') OR define('API_SUCCESS', 1);
defined('API_FAILED') OR define('API_FAILED', 0);
defined('SESSION_TIME_OUT') OR define('SESSION_TIME_OUT', -1);

class Api extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->isValid()) {
            show_404();
        }
    }

    public function setUserCount($count) {
        $this->session->set_userdata('user_count',$count);
    }

    public function add()
    {
        $data = $this->input->post();

        $this->addItem($data['menu_id']);
        $rowid = $this->getRowIDByMenuId($data['menu_id']);

        $count = 0;
        if ($rowid) {
            $count = $this->getItemByRowID($rowid)['qty'];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('result' => API_SUCCESS, 'subcount' => $count ,'totalcount'=>$this->getItemCount())));
    }

    public function remove()
    {
        $data = $this->input->post();
        $this->removeItem($data['menu_id']);
        $rowid = $this->getRowIDByMenuId($data['menu_id']);
        $count = 0;
        if ($rowid) {
            $count = $this->getItemByRowID($rowid)['qty'];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('result' => API_SUCCESS, 'subcount' => $count ,'totalcount'=>$this->getItemCount())));
    }


    public function order()
    {
        $areaId = $this->session->area_id;
        if (!isset($areaId)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('result' =>SESSION_TIME_OUT)));
            return;
        }

        $sessionId = $this->area_session_model->get_area_session_id($areaId);
        foreach ($this->cart->contents() as $content) {
            $data = array(
                "menu_id" => $content['menu_id'],
                "area_id" => $areaId,
                //"category_id" => $content['category_id'],
                "session_id" => $sessionId,
                "quantity" => $content['qty'],
                "update_date_time" => date('Y-m-d H:i:s'),
                "created_from_ip" => $this->input->ip_address(),
                "date_created" => date("Y-m-d H:i:s"));
            if (!$this->order_session_model->add($data)) {
                // order success.
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('result' =>API_FAILED)));
                return;

            }
            $this->destroyCart();
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('result' => API_SUCCESS, 'totalcount' => 0)));

        }
    }

    private function isValid()
    {
        $postdata = $this->input->post();
        if (!$this->input->is_ajax_request()
            || $this->input->method(TRUE) != 'POST'
            || !isset($postdata)
            || empty($postdata)
        ) {
            return FALSE;
        }
        return TRUE;
    }

    public function _debug()
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->getCartItems()));
    }

}
