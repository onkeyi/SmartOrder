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
class Admin_client_model extends MY_AdminModel
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_all($no = NULL)
    {
        $this->db->select('*');
        $this->db->from("client");
        if (isset($no)) $this->db->where('no',$no);
        $this->db->order_by('no');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data) {

        $this->db->insert('client',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update($data) {
        $this->db->where('no',$data['no']);
        return $this->db->update('client',$data);
    }

    public function get_client_by_id($no) {
        $this->db->select("*");
        $this->db->from("client");
        $this->db->where('no', $no);
        $query = $this->db->get();
        return $query->result();
    }
}
