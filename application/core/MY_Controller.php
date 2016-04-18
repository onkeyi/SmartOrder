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
 * @package    SmartOrder
 * @author    onkeyi
 * @license    http://opensource.org/licenses/MIT	MIT License
 * @link    http://onkeyi.github.io/SmartOrder/
 * @filesource
 */
class MY_Controller extends CI_Controller
{

    protected $theme = "";

    function __construct()
    {
        parent::__construct();
    }

    /**
     * 追加
     * @param $menuId
     */
    public function addItem($menuId)
    {
        $menuData = $this->menu_model->get_menu_by_id($menuId);

        $data = array(
            'id' => $menuId,
            'name' => $menuData->menu_name,
            'menu_id' => $menuData->menu_id,
            'menu_name' => $menuData->menu_name,
            'qty' => 1,
            'price' => $menuData->price,
            'category_id' => $menuData->category_id,
            'category_name' => $menuData->category_name);

        if (!($rowId = $this->getRowIDByMenuId($menuId))) {
            $this->cart->insert($data);
        } else {
            $item = $this->cart->get_item($rowId);
            $item['qty'] += 1;
            $this->cart->update($item);
        }
    }

    /**
     * 削除
     * @param $rowId
     * @return bool
     */
    public function removeItem($menuId)
    {
        $rowId = $this->getRowIDByMenuId($menuId);
        $item = $this->cart->get_item($rowId);
        if (!isset($item)) return FALSE;

        $count = $item['qty'];
        $count--;

        if ($count <= 0) {
            $this->cart->remove($rowId);
        } else {
            $item['qty'] = $count;
            $this->cart->update($item);
        }
    }

    /**
     *  TOTAL 金額
     * @return mixed
     */
    public function getTotal()
    {
        return $this->cart->total();
    }

    /**
     * アイテム　数
     * @return mixed
     */
    public function getItemCount()
    {
        return $this->cart->total_items();
    }

    /**
     * rowid 取得
     * @param $menuId
     * @return bool
     */
    public function getRowIDByMenuId($menuId)
    {
        foreach ($this->getCartItems() as $items) {
            if ($items['id'] == $menuId) return $items['rowid'];
        }
        return FALSE;
    }

    public function getItemByMenuId($menuId)
    {
        $rowId = $this->getRowIDByMenuId($menuId);
        if (!$rowId) return $this->getItemByRowID($rowId);

        return NULL;
    }

    public function getItemByRowID($rowId)
    {
        return $this->cart->get_item($rowId);
    }

    /**
     * 全部
     * @return mixed
     */
    public function getCartItems()
    {
        return $this->cart->contents();
    }

    /**
     * 破棄
     */
    public function destroyCart()
    {
        $this->cart->destroy();
    }
}


class MY_AdminController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if ($this->agent->is_mobile()) {
            show_404();
        }

        $isLogin = $this->session->userdata('userdata');
        if (!isset($isLogin)) {
            $this->load->view('admin/login');
        }
    }
}