<?php
	$CI = get_instance();
	$CI->load->database();
	$CI->load->dbforge();


	// add paid column
    if (!$CI->db->field_exists('deactivate_reason', 'user')):
        $deactivate_reason = array(
            'deactivate_reason' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        );
        $CI->dbforge->add_column('user', $deactivate_reason);
    endif;


    // add paid column
    if (!$CI->db->field_exists('resolution', 'download_link')):
        $resolution = array(
            'resolution' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
                'default'=>'720p',
            ),
        );
        $CI->dbforge->add_column('download_link', $resolution);
    endif;

    // add paid column
    if (!$CI->db->field_exists('file_size', 'download_link')):
        $file_size = array(
            'file_size' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
                'default'=>'00MB',
            ),
        );
        $CI->dbforge->add_column('download_link', $file_size);
    endif;


    // add paid column
    if (!$CI->db->field_exists('in_app_download', 'download_link')):
        $in_app_download = array(
            'in_app_download' => array(
                'type' => 'INT',
                'constraint' => 10,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('download_link', $in_app_download);
    endif;

    // add paid column
    if (!$CI->db->field_exists('is_paid', 'videos')):
        $is_paid = array(
            'is_paid' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('videos', $is_paid);
    endif;


     // add paid column
    if (!$CI->db->field_exists('is_paid', 'live_tv')):
        $is_paid2 = array(
            'is_paid' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('live_tv', $is_paid2);
    endif;

	// add last_ep_add column
    if (!$CI->db->field_exists('last_ep_added', 'videos')):
        $last_ep_added = array(
            'last_ep_added' => array(
                'type' => 'datetime',
                'default'=>'2019-01-01 00:00:00',
            ),
        );
        $CI->dbforge->add_column('videos', $last_ep_added);
    endif;

    // add last_ep_add column
    if (!$CI->db->field_exists('last_ep_added', 'episodes')):
        $last_ep_added2 = array(
            'last_ep_added' => array(
                'type' => 'datetime',
                'default'=>'2019-01-01 00:00:00',
            ),
        );
        $CI->dbforge->add_column('episodes', $last_ep_added2);
    endif;

    // add last_ep_add column
    if (!$CI->db->field_exists('date_added', 'episodes')):
        $date_added = array(
            'date_added' => array(
                'type' => 'datetime',
                'default'=>'2019-01-01 00:00:00',
            ),
        );
        $CI->dbforge->add_column('episodes', $date_added);
    endif;

    // add order column
    if (!$CI->db->field_exists('order', 'episodes')):
        $order = array(
            'order' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('episodes', $order);
    endif;

    // add order column
    if (!$CI->db->field_exists('order', 'seasons')):
        $seasons = array(
            'order' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('seasons', $seasons);
    endif;

    // add order column
    if (!$CI->db->field_exists('order', 'video_file')):
        $video_file = array(
            'order' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('video_file', $video_file);
    endif;

    // add label column
    if (!$CI->db->field_exists('label', 'video_file')):
        $label2 = array(
            'label' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('video_file', $label2);
    endif;

     // add paid column
    if (!$CI->db->field_exists('in_app_download', 'download_link')):
        $in_app_download = array(
            'in_app_download' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('download_link', $in_app_download);
    endif;


    // add action_type column
    if (!$CI->db->field_exists('action_type', 'slider')):
        $action_type = array(
            'action_type' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => TRUE,
            ),
        );
        $CI->dbforge->add_column('slider', $action_type);
    endif;

    // add action_btn_text column
    if (!$CI->db->field_exists('action_btn_text', 'slider')):
        $action_btn_text = array(
            'action_btn_text' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        );
        $CI->dbforge->add_column('slider', $action_btn_text);
    endif;    

    // add action_id column
    if (!$CI->db->field_exists('action_id', 'slider')):
        $action_id = array(
            'action_id' => array(
                'type' => 'INT',
                'constraint' => 50,
                'null' => TRUE,
            ),
        );
        $CI->dbforge->add_column('slider', $action_id);
    endif;


    // add action_url column
    if (!$CI->db->field_exists('action_url', 'slider')):
        $action_url = array(
            'action_url' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        );
        $CI->dbforge->add_column('slider', $action_url);
    endif;

    // add order column
    if (!$CI->db->field_exists('order', 'slider')):
        $order = array(
            'order' => array(
                'type' => 'INT',
                'constraint' => 50,
                'default'=>'0',
            ),
        );
        $CI->dbforge->add_column('slider', $order);
    endif;


    // add phone column
    if (!$CI->db->field_exists('phone', 'user')):
        $phone = array(
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => TRUE,
            ),
        );
        $CI->dbforge->add_column('user', $phone);
    endif;


    // add dob column
    if (!$CI->db->field_exists('dob', 'user')):
        $dob = array(
            'dob' => array(
                'type' => 'DATE',
                'default'=>'0000-00-00',
            ),
        );
        $CI->dbforge->add_column('user', $dob);
    endif;

     // add firebase_auth_uid column
    if (!$CI->db->field_exists('firebase_auth_uid', 'user')):
        $firebase_auth_uid = array(
            'firebase_auth_uid' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => TRUE,
            ),
        );
        $CI->dbforge->add_column('user', $firebase_auth_uid);
    endif;

    // delete garbage file

    $file_path = APPPATH.'controllers\Api.php';
    if(file_exists($file_path)):
        unlink($file_path);
    endif;


?>
