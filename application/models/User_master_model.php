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
class User_master_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_all($userNo = NULL)
    {
        $this->db->select('*');
        $this->db->from("user_master");
        if (isset($userNo)) $this->db->where('user_no',$userNo);
        $this->db->order_by('user_no');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_used()
    {
        $this->db->select("*");
        $this->db->from("user_master");
        $this->db->where('use_yn', 'Y');
        $this->db->order_by('user_no');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_by_no($userNo) {
        $this->db->select('*');
        $this->db->from("user_master");
        $this->db->where('user_no', $userNo);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

    public function get_user_by_name($userName) {
        $this->db->select('*');
        $this->db->from("user_master");
        $this->db->where('user_name', $userName);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

    public function add($data) {
        $data['password'] = sha1($data['password']);
        $this->db->insert('user_master',$data);
        $lastInsertId = $this->db->insert_id();

        return ($this->db->affected_rows() != 1) ? false : $lastInsertId;
    }

    public function delete($uid) {
        $this->db->where('user_no',$uid);
        return $this->db->delete('user_master');
    }

    public function update($data) {
        if (!empty($data['password'])) {
            $data['password'] = sha1($data['password']);
        } else {
            unset($data['password']);
        }

        $this->db->where('user_no',$data['user_no']);
        return $this->db->update('user_master',$data);
    }

    public function get_user_by_id($userId) {
        $this->db->select("*");
        $this->db->from("user_master");
        $this->db->where('user_id', $userId);
        $this->db->where('use_yn','Y');
        $query = $this->db->get();
        return $query->result();
    }
}
