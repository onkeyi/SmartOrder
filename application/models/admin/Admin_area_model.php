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
class Admin_area_model extends MY_AdminModel
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_all($categoryId = NULL)
    {
        $this->db->select('*');
        $this->db->from("area_list_view");
        $this->db->where('area_language_id', $this->siteLangCode);
        if (isset($categoryId)) $this->db->where('category_id', $categoryId);
        $this->db->order_by('area_id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_area_by_name($areaName) {
        $this->db->select('*');
        $this->db->from("area_list_view");
        $this->db->where('area_name', $areaName);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

    public function get_used()
    {
        $this->db->select("*");
        $this->db->from("area_list_view");
        $this->db->where('use_yn', 'Y');
        $this->db->where('area_language_id', $this->siteLangCode);
        $this->db->order_by('area_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_area_by_id($areaId)
    {
        $this->db->select("*");
        $this->db->from("area_list_view");
        $this->db->where('area_id', $areaId);
        $this->db->where('area_language_id', $this->siteLangCode);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_area_names($areaId)
    {

        $this->db->where("area_id", $areaId);
        $this->db->from('area_language_view');
        $this->db->order_by('area_language_id');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * @param $data {area_name,area_description,
     * @return bool
     */
    public function add($data)
    {
        $areaNames  = $data['area_name'];
        $areaDescription  = $data['area_description'];
        unset($data['area_name']);
        unset($data['area_description']);

        $this->db->trans_begin();
        $data['date_created'] = date('Y-m-d H:i:s');
        $this->db->insert('area_master', $data);

        $lastInsertId = $this->db->insert_id();

        // 言語分挿入
        $languages = $this->admin_language_model->get_used();
        $i = 0;
        foreach ($languages as $l) {
            $areaName = isset($areaNames[$i]) ? $areaNames[$i] : "" ;
            $insertAreaLanguageData = array(
                'area_id' => $lastInsertId,
                'language_id' => $l->language_id,
                'area_name' => $areaName,
                'area_description' => $areaDescription
            );
            $this->db->insert('area_language', $insertAreaLanguageData);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            }
            $i++;
        }

        $this->db->trans_commit();
        return $lastInsertId;
    }

    public function delete($areaId)
    {
        $this->db->from('area_master');
        $this->db->where('area_id', $areaId);
        return $this->db->delete();
    }

    /**
     * update area_master , area_language table.
     * @param $data
     * @return bool
     * @throws Exception
     */
    public function update($data)
    {
        if (!isset($data['area_id'])) throw new Exception('set area_id in data');
        $areaNames  = $data['area_name'];
        $areaDescription  = $data['area_description'];
        unset($data['area_name']);
        unset($data['area_description']);

        $this->db->trans_begin();

        $this->db->where('area_id', $data['area_id']);
        $this->db->update('area_master', $data);

        // 言語分更新
        if (isset($areaNames)) {
            $languages = $this->admin_language_model->get_used();
            $i = 0;

            foreach ($languages as $l) {
                $areaName = isset($areaNames[$i]) ? $areaNames[$i] : "" ;
                $insertAreaLanguageData = array(
                    'area_id' => $data['area_id'],
                    'language_id' => $l->language_id,
                    'area_name' => $areaName,
                    'area_description' => $areaDescription
                );
                $this->db->replace('area_language',$insertAreaLanguageData);
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
