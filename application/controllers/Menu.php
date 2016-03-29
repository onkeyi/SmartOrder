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
class Menu extends MY_Controller
{
    /**
     * all menu
     */
    public function index()
    {
        $data['theme'] = $this->theme;
        $data['categorys'] = $this->category_model->get_all_used_category();
        $data['menus'] = $this->menu_model->get_all_used_menu();
        $this->load->view('go/' . $this->theme . '/all_menu', $data);
    }

    /**
     * 各カテゴリー
     * @param int $categoryId
     */
    public function category($categoryId = 1)
    {
        $data['theme'] = $this->theme;
        $data['category'] = $this->category_model->get_category_by_id($categoryId);
        $data['menus'] = $this->menu_model->get_by_category_menu($categoryId);
        $this->load->view('go/' . $this->theme . '/menu', $data);
    }


    public function cart()
    {
        $data['theme'] = $this->theme;
        $this->load->view('go/' . $this->theme . '/cart', $data);
    }



    public function orderHistory()
    {
        $data['order_session'] = $this->order_session_model->get_area_order($this->session->area_id);
        $data['theme'] = $this->theme;
        $this->load->view('go/' . $this->theme . '/orderhistory', $data);

    }
}
