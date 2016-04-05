<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
class Admin_category_model extends MY_AdminModel
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from("category_list_view");
        $this->db->where('category_language_id', $this->siteLangCode);
        $this->db->order_by('category_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_by_language_id($lang)
    {
        $this->db->select('*');
        $this->db->from("category_list_view");
        $this->db->where('category_language_id', $lang);
        $this->db->order_by('category_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_category_by_id($categoryId)
    {
        $this->db->select('*');
        $this->db->from("category_list_view");
        $this->db->where('category_language_id', $this->siteLangCode);
        $this->db->where('category_id', $categoryId);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_category_by_name($categoryName) {
        $this->db->select('*');
        $this->db->from("category_list_view");
        $this->db->where('category_name', $categoryName);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

    public function get_used()
    {
        $this->db->select("*");
        $this->db->from("category_list_view");
        $this->db->where('use_yn', 'Y');
        $this->db->where('category_language_id', $this->siteLangCode);
        $this->db->order_by('category_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_category_names($categoryId)
    {

        $this->db->where("category_id", $categoryId);
        $this->db->from('category_language_view');
        $this->db->order_by('category_language_id');
        $query = $this->db->get();

        return $query->result();
    }


    public function add($data)
    {
        $categoryNames = $data['category_name'];
        $categoryDescription = $data['category_description'];
        unset($data['category_name']);
        unset($data['category_description']);

        $this->db->trans_begin();

        $data['date_created'] = date('Y-m-d H:i:s');
        $this->db->insert('category_master', $data);

        $lastInsertId = $this->db->insert_id();

        // 言語分挿入
        $languages = $this->admin_language_model->get_used();
        $i = 0;
        foreach ($languages as $l) {
            $categoryName = isset($categoryNames[$i]) ? $categoryNames[$i] : "";
            $insertCategoryLanguageData = array(
                'category_id' => $lastInsertId,
                'language_id' => $l->language_id,
                'category_name' => $categoryName,
                'category_description' => $categoryDescription);
            $this->db->insert('category_language', $insertCategoryLanguageData);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            }
            $i++;
        }
        $this->db->trans_commit();

        return TRUE;
    }

    public function delete($categoryId)
    {
        $this->db->from('category_master');
        $this->db->where('category_id', $categoryId);
        return $this->db->delete();
    }

    public function delete_all() {
        return $this->db->delete('category_master');
    }

    public function update($data)
    {
        if (!isset($data['category_id'])) throw new Exception('set category_id in data');

        $categoryNames = $data['category_name'];
        $categoryDescription = $data['category_description'];
        unset($data['category_name']);
        unset($data['category_description']);

        $this->db->trans_begin();

        $this->db->where('category_id', $data['category_id']);
        $this->db->update('category_master', $data);


        if (isset($categoryNames)) {
            $languages = $this->language_model->get_used();
            $i = 0;
            foreach ($languages as $l) {
                $categoryName = isset($categoryNames[$i]) ? $categoryNames[$i] : "";
                $insertCategoryLanguageData = array(
                    'category_id' => $data['category_id'],
                    'language_id' => $l->language_id,
                    'category_name' => $categoryName,
                    'category_description' => $categoryDescription);
                $this->db->replace('category_language',$insertCategoryLanguageData);
                $i++;
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }
}
