<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trigger
 *
 * @author Laxmisoft
 */
class Trigger extends CI_Controller {

    private $timezone = "";
    private $date = "";
    private $hour = "";
    private $minute = "";
    private $second = "";

    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->library('parser');
        $this->load->library('common');

        $this->load->model("admin/m_contacts", 'objcontact');
        $this->load->model('admin/m_trigger', 'objtrigger');
        $this->load->model('admin/m_list_builder', 'objbuilder');
    }

    function index() {
        // UM =  - to UTC 
        // UP = UTC to + 
//        $this->timezone = "UM8";
        $this->timezone = "UP55";
        $datetime = date('Y-m-d H:i:s', gmt_to_local(time(), $this->timezone, TRUE));
        echo "{$this->session->userdata('email')}<br>";
        echo "<pre>";
        echo "FULL TIME : {$datetime}<br>";

        $this->date = date('Y-m-d', strtotime($datetime));
        $this->hour = date('H', strtotime($datetime)) - 1;
        if ($this->hour == -1)
            $this->hour = 23;
        $this->minute = date('i', strtotime($datetime));
        $this->second = date('s', strtotime($datetime));

        $blackList = $this->objcontact->getBlackList();
        $res = $this->objtrigger->getEvents($this->date);


//        print_r($res);
        echo "DATE : " . $this->date . '<br>';
        echo "HOUR : " . $this->hour . '<br>';
        echo "MINUTE : " . $this->minute . '<br>';
        echo "SECOND : " . $this->second . '<br>';

        foreach ($res as $value) {

            if ($this->hour == $value->h && $this->minute == $value->m) {
                echo "<br>-------------Event ID : {$value->event_id} ...! ----------------<br>";
                echo "HOUR : " . $value->h . '<br>';
                echo "MINUTE : " . $value->m . '<br>';

                if ($value->notify == "them") {
                    switch ($value->group_type) {
                        case 'individual':

                            if (!in_array($value->user_id, $blackList)) {

                                $contact = $this->objcon->getContactInfo($value->user_id);
                                $tag = $this->common->setToken($contact);

                                if ($value->event_type == "sms") {
                                    $body = $this->parser->parse_string($value->body, $tag, TRUE);

                                    if ($this->common->sendSMS($contact->phone, $body)) {
                                        if ($value->is_repeat && $value->end_type == "never")
                                            $this->objtrigger->addNextEvent($value->event_id);
                                        $this->objtrigger->updateStatus($value->event_id);
                                    } else {
                                        echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                                    }
                                } else if ($value->event_type == "email") {

                                    $subject = $this->parser->parse_string($value->subject, $tag, TRUE);
                                    $body = $this->parser->parse_string($value->body, $tag, TRUE);

                                    if ($this->common->sendMail($contact->email, $subject, $body)) {
                                        if ($value->is_repeat && $value->end_type == "never")
                                            $this->objtrigger->addNextEvent($value->event_id);
                                        $this->objtrigger->updateStatus($value->event_id);
                                    } else {
                                        echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                                    }
                                }
                            }
                            break;
                        case 'simple':
                            $res = $this->objbuilder->getGroupContact($value->group_id);
                            $cids = $res[1];
                            foreach ($cids as $cid) {
                                if (!in_array($cid, $blackList)) {
                                    $contact = $this->objcon->getContactInfo($cid);
                                    $tag = $this->common->setToken($contact);
                                    if ($value->event_type == "sms") {
                                        $body = $this->parser->parse_string($value->body, $tag, TRUE);
                                        if ($this->common->sendSMS($contact->phone, $body)) {
                                            if ($value->is_repeat && $value->end_type == "never")
                                                $this->objtrigger->addNextEvent($value->event_id);
                                            $this->objtrigger->updateStatus($value->event_id);
                                        } else {
                                            echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                                        }
                                    } else if ($value->event_type == "email") {

                                        $subject = $this->parser->parse_string($value->subject, $tag, TRUE);
                                        $body = $this->parser->parse_string($value->body, $tag, TRUE);

                                        if ($this->common->sendMail($contact->email, $subject, $body)) {
                                            if ($value->is_repeat && $value->end_type == "never")
                                                $this->objtrigger->addNextEvent($value->event_id);
                                            $this->objtrigger->updateStatus($value->event_id);
                                        } else {
                                            echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                                        }
                                    }
                                }
                            }
                            break;
                        case 'sms':
                            $cids = $this->objbuilder->getSubGroupContact($value->group_id);
                            foreach ($cids as $cid) {
                                if (!in_array($cid, $blackList)) {
                                    $contact = $this->objcon->getContactInfo($cid);
                                    $tag = $this->common->setToken($contact);
                                    if ($value->event_type == "sms") {
                                        $body = $this->parser->parse_string($value->body, $tag, TRUE);
                                        if ($this->common->sendSMS($contact->phone, $body)) {
                                            if ($value->is_repeat && $value->end_type == "never")
                                                $this->objtrigger->addNextEvent($value->event_id);
                                            $this->objtrigger->updateStatus($value->event_id);
                                        } else {
                                            echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                                        }
                                    } else if ($value->event_type == "email") {
                                        $subject = $this->parser->parse_string($value->subject, $tag, TRUE);
                                        $body = $this->parser->parse_string($value->body, $tag, TRUE);

                                        if ($this->common->sendMail($contact->email, $subject, $body)) {
                                            if ($value->is_repeat && $value->end_type == "never")
                                                $this->objtrigger->addNextEvent($value->event_id);
                                            $this->objtrigger->updateStatus($value->event_id);
                                        } else {
                                            echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                                        }
                                    }
                                }
                            }
                            break;
                    }
                } else {
                    $userInfo = $this->common->getAdminInfo($value->user_id);
                    $tag = $this->common->setToken($userInfo);
                    print_r($tag);
                    if ($value->event_type == "sms") {
                        $body = $this->parser->parse_string($value->body, $tag, TRUE);

                        if ($this->common->sendSMS($userInfo->phone, $body)) {
                            if ($value->is_repeat && $value->end_type == "never")
                                $this->objtrigger->addNextEvent($value->event_id);
                            $this->objtrigger->updateStatus($value->event_id);
                        } else {
                            echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                        }
                    } else if ($value->event_type == "email") {
                        $subject = $this->parser->parse_string($value->subject, $tag, TRUE);
                        $body = $this->parser->parse_string($value->body, $tag, TRUE);

                        if ($this->common->sendMail($userInfo->email, $subject, $body)) {
                            if ($value->is_repeat && $value->end_type == "never")
                                $this->objtrigger->addNextEvent($value->event_id);
                            $this->objtrigger->updateStatus($value->event_id);
                        } else {
                            echo "<br>-------------Event ID : {$value->event_id} Failed...! ----------------<br>";
                        }
                    }
                }
            }
        }
    }

}
