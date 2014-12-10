<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * This file is part of lmsimple.
 *
 * lmsimple is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * lms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with lms.  If not, see <http://www.gnu.org/licenses/>.
 */

class Api extends CI_Controller {
    
    /**
     * Default constructor
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * REST End Point : Display the list of the leave requests of the connected user
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getLeaves() {
        //Check if input parameters are set
        if ($this->input->get_post('login') && $this->input->get_post('password')) {
            //Check user credentials
            $login = $this->input->get_post('login');
            $password = $this->input->get_post('password');
            $this->load->model('users_model');
            $user_id = $this->users_model->check_authentication($login, $password);
            if ($user_id != -1) {
                $this->load->model('leaves_model');
                $this->expires_now();
                header("Content-Type: application/json");
                $leaves = $this->leaves_model->get_employee_leaves($user_id);
                echo json_encode($leaves);
            } else {    //Wrong inputs
                $this->output->set_header("HTTP/1.1 422 Unprocessable entity");
            }
        } else {    //Unauthorized
            $this->output->set_header("HTTP/1.1 403 Forbidden");
        }
    }

    /**
     * REST End Point : Display a leave request
     * @param int $id identifier of the leave request
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function getLeaveById($id) {
        //Check if input parameters are set
        if ($this->input->get_post('login') && $this->input->get_post('password')) {
            //Check user credentials
            $login = $this->input->get_post('login');
            $password = $this->input->get_post('password');
            $this->load->model('users_model');
            $user_id = $this->users_model->check_authentication($login, $password);
            if ($user_id != -1) {
                $this->load->model('leaves_model');
                $this->expires_now();
                header("Content-Type: application/json");
                $leave = $this->leaves_model->get_leaves($id);
                echo json_encode($leave);
            } else {    //Wrong inputs
                $this->output->set_header("HTTP/1.1 422 Unprocessable entity");
            }
        } else {    //Unauthorized
            $this->output->set_header("HTTP/1.1 403 Forbidden");
        }
    }
    
    /**
     * Internal utility function
     * make sure a resource is reloaded every time
     */
    private function expires_now() {
        // Date in the past
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        // always modified
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        // HTTP/1.1
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        // HTTP/1.0
        header("Pragma: no-cache");
    }
}
