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
class Master extends MY_AdminController
{

    public function index()
    {
        $this->tableList();
    }

    public function tableList()
    {
        $data['area'] = $this->admin_area_model->get_all();
        $this->load->view('admin/master/table_list', $data);
    }

    public function selectTable($tableNo = NULL)
    {
        $result = $this->admin_area_model->get_area_by_id($tableNo);

        $data['area_names'] = $this->admin_area_model->get_area_names($tableNo);

        $data['lang'] = $this->admin_language_model->get_used();
        $data['area_id'] = "";
        $data['area_name'] = "";
        $data['area_description'] = "";
        $data['use_yn'] = "";

        foreach ($result as $r) {
            $data['area_id'] = $r->area_id;
            $data['area_name'] = $r->area_name;
            $data['area_description'] = $r->area_description;
            $data['use_yn'] = $r->use_yn;
        }
        $this->load->view('admin/master/table_detail', $data);
    }


    public function categoryList()
    {
        $data['category'] = $this->admin_category_model->get_all();

        $this->load->view('admin/master/category_list', $data);
    }

    public function selectCategory($categoryId = NULL)
    {
        $data['category_id'] = "";
        $data['category_name'] = "";
        $data['category_description'] = "";
        $data['use_yn'] = "";
        $data['lang'] = $this->admin_language_model->get_used();
        $data['category_names'] = $this->admin_category_model->get_category_names($categoryId);

        if (isset($categoryId)) {
            $category = $this->admin_category_model->get_category_by_id($categoryId);
            foreach ($category as $c) {
                $data['category_id'] = $c->category_id;
                $data['category_name'] = $c->category_name;
                $data['category_description'] = $c->category_description;
                $data['use_yn'] = $c->use_yn;
            }
        }
        $this->load->view('admin/master/category_detail', $data);
    }

    public function menuList()
    {
        $data['category'] = $this->admin_category_model->get_all();
        $data['menu'] = $this->admin_menu_model->get_all();

        $this->load->view('admin/master/menu_list', $data);
    }

    public function selectMenu($menuId = NULL)
    {
        $data['category'] = $this->admin_category_model->get_all();
        $data['menu_id'] = "";
        $data['menu_name'] = "";
        $data['menu_description'] = "";
        $data['price'] = "";
        $data['main_image'] = "";
        $data['use_yn'] = "";
        $data['lang'] = $this->admin_language_model->get_used();
        $data['menu_names'] = $this->admin_menu_model->get_menu_names($menuId);

        if (isset($menuId)) {
            $menu = $this->admin_menu_model->get_menu_by_id($menuId);
            foreach ($menu as $m) {
                $data['menu_id'] = $m->menu_id;
                $data['menu_name'] = $m->menu_name;
                $data['menu_description'] = $m->menu_description;
                $data['price'] = $m->price;
                $data['use_yn'] = $m->use_yn;
                $data['category_id'] = $m->category_id;
                $data['main_image'] = isset($m->main_image) ? $m->main_image : "";
            }
        }

        $this->load->view('admin/master/menu_detail', $data);
    }

    public function languageList()
    {
        $data['language'] = $this->admin_language_model->get_all();

        $this->load->view('admin/master/language_list', $data);
    }


    public function selectLanguage($languageId = NULL)
    {
        $data['language_id'] = "";
        $data['language_name'] = "";
        $data['language_description'] = "";
        $data['use_yn'] = "";

        if (isset($languageId)) {
            $lang = $this->admin_language_model->get_language_by_id($languageId);

            foreach ($lang as $l) {
                $data['language_id'] = $l->language_id;
                $data['language_name'] = $l->language_name;
                $data['language_description'] = $l->language_description;
                $data['use_yn'] = $l->use_yn;
            }
        }

        $this->load->view('admin/master/language_detail', $data);
    }

    public function userList()
    {
        $data['users'] = $this->admin_user_master_model->get_all();
        $this->load->view('admin/master/user_list', $data);
    }

    public function selectUser($userNo = NULL)
    {
        $data['user_no'] = "";
        $data['user_id'] = "";
        $data['user_name'] = "";
        $data['password'] = "";
        $data['group'] = "";
        $data['use_yn'] = "";

        if (isset($userNo)) {
            $user = $this->admin_user_master_model->get_all($userNo);
            foreach ($user as $u) {
                $data['user_no'] = $u->user_no;
                $data['user_id'] = $u->user_id;
                $data['user_name'] = $u->user_name;
                $data['password'] = $u->password;
                $data['group'] = $u->group;
                $data['use_yn'] = $u->use_yn;
            }
        }

        $this->load->view('admin/master/user_detail', $data);
    }

    public function clientList()
    {
        $data['no'] = "";
        $data['client_name'] = "";
        $data['address'] = "";
        $data['address2'] = "";
        $data['tel'] = "";
        $data['postcode'] = "";
        $data['logo_image'] = "";

        $client = $this->admin_client_model->get_all();
        foreach ($client as $c) {
            $data['no'] = $c->no;
            $data['client_name'] = $c->client_name;
            $data['address'] = $c->address;
            $data['address2'] = $c->address2;
            $data['tel'] = $c->tel;
            $data['postcode'] = $c->postcode;
            $data['logo_image'] = $c->logo_image;
        }

        $this->load->view('admin/master/client_list', $data);
    }

    public function selectClient($no = NULL)
    {
        $this->load->model('client_model');

        $data['no'] = "";
        $data['client_name'] = "";
        $data['address'] = "";
        $data['address2'] = "";
        $data['tel'] = "";
        $data['postcode'] = "";
        $data['logo_image'] = "";

        if (isset($no)) {
            $client = $this->admin_client_model->get_all($no);
            foreach ($client as $c) {
                $data['no'] = $c->no;
                $data['client_name'] = $c->client_name;
                $data['address'] = $c->address;
                $data['address2'] = $c->address2;
                $data['tel'] = $c->tel;
                $data['postcode'] = $c->postcode;
                $data['logo_image'] = $c->logo_image;
            }
        }
        $this->load->view('admin/master/client_detail', $data);
    }

    public function csvupload() {
        $this->load->view('admin/master/csv_import');
    }
}
