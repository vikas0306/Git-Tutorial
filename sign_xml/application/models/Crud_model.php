<?php
/*
* Developed by : Vikas Ravidas
* Developed On : 03/08/2022
* Project name : Hospital Website
* Filename     : Banners_model.php
* File_path    : tbd_website/admin/application/models/Banners_model.php
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	

	public function GetData($table,$field='',$condition='',$group='',$order='',$limit='',$result='')
    {
        if($field != '')
        $this->db->select($field);
        if($condition != '')
        $this->db->where($condition);
        if($order != '')
        $this->db->order_by($order);
        if($limit != '')
        $this->db->limit($limit);
        if($group != '')
        $this->db->group_by($group);
        if($result != '')
        {
            $return =  $this->db->get($table)->row();
        }else{
            $return =  $this->db->get($table)->result();
        }
        return $return;
    }

    public function GetDataArr($table,$field='',$condition='',$group='',$order='',$limit='',$result='')
    {
        if($field != '')
        $this->db->select($field);
        if($condition != '')
        $this->db->where($condition);
        if($order != '')
        $this->db->order_by($order);
        if($limit != '')
        $this->db->limit($limit);
        if($group != '')
        $this->db->group_by($group);
        if($result != '')
        {
            $return =  $this->db->get($table)->row_array();
        }else{
            $return =  $this->db->get($table)->result_array();
        }
        return $return;
    }

	public function SaveData($table,$data,$condition='')
    {
    	$DataArray = array();
        if(!empty($data))
        {
            $data['created']=date("Y-m-d H:i:s");
            $data['modified']=date("Y-m-d H:i:s");
        }
        $table_fields = $this->db->list_fields($table);
        foreach($data as $field=>$value)
        {
            if(in_array($field,$table_fields))
            {
                $DataArray[$field]= $value;
            }
        }
       
        if($condition != '')
    	{
    		$this->db->where($condition);
    		$this->db->update($table, $DataArray);
    	}else{
    		$this->db->insert($table, $DataArray);
            
    	}
        return 1;
    }

    public function DeleteData($table,$condition='',$limit='')
    {
       if($condition != '')
        $this->db->where($condition);
        if($limit != '')
        $this->db->limit($limit);
        $this->db->delete($table);
    }

    function get_single($tablename,$condition)
    {
        $this->db->where($condition);   
        return $this->db->get($tablename)->row();
    }

    public function leadStatusCounts($condition)
    {
        $this->db->select("l.lead_status_id,ls.name as lead_status,COUNT(*) as total_counts");
        $this->db->from("leads as l");     
        $this->db->join('lead_status as ls','ls.id = l.lead_status_id','left');  
        $this->db->where($condition); 
        $this->db->group_by("l.lead_status_id"); 
        return $this->db->get()->result(); 
    }

    public function getproject($sql)
    {
        $this->db->select($sql);
        return $this->db->get()->row(); 
    }  
    public function getPropertyType($sql)
    {
        $this->db->select($sql);
        return $this->db->get()->row(); 
    }
   public function GetNoticaton($cond)
    {
        $this->db->select("n.description,n.id,n.lead_id,l.customer_name,n.flag,DATE_FORMAT(n.created,'%d %M %Y') as ondate,n.alert,e.name as assigned_to,t.name as created_by");
        $this->db->from("notifications as n");
        $this->db->join("employees e","e.id=n.assigned_id","left");
        $this->db->join("employees t","t.id=n.assigned_id","left");
        $this->db->join("leads l","l.id=n.lead_id","left");
        $this->db->where($cond);
        $result = $this->db->get()->result();
        return $result;
    }
} ?>
