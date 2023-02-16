<?php 

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Users_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    var $column_order = array(null,'users.name',null,null); //set column field database for datatable orderable
    var $column_search = array('users.name'); //set column field database for datatable searchable
    var $order = array('users.name' => 'Asc'); // default order
 
    private function _get_datatables_query()
    {
        $this->db->select("*");
        $this->db->from("users");
        //$this->db->where('users.is_delete="No"');

        $i = 0;
     
        if($_POST['search']['value']) // if datatable send POST for search
        {
            $explode_string = explode(' ', $_POST['search']['value']);

            foreach ($explode_string as $show_string) {
            $cond  = " ";
            $cond.=" (users.name LIKE '%".$show_string."%' ) ";        
            $this->db->where($cond);
            }
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($condition='')
    {   
        if(!empty($condition))
        $this->db->where($condition);
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    /*function get_datatables($table,$condition='')
    {
        if(!empty($condition))
        $this->db->where($condition);
        $this->_get_datatables_query($table,$condition);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }*/
    
    function count_filtered($condition='')
    {   
        if(!empty($condition))
        $this->db->where($condition);
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($condition='')
    {
        if(!empty($condition))
        $this->db->where($condition);
        $this->db->select("*");
        $this->db->from("users");
        //$this->db->where('users.is_delete="No"');
        return $this->db->count_all_results();
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
        }
        else
        {
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
            $data['modified']=date("Y-m-d H:i:s");
        }
        if(empty($condition))
        {
            $data['created']=date("Y-m-d H:i:s");
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
        }
        else
        {
            $this->db->insert($table, $DataArray);
        }
    }

    /*Delete any table data*/
    public function DeleteData($table,$condition='',$limit='')
    {
        if($condition != '')
        $this->db->where($condition);
        if($limit != '')
        $this->db->limit($limit);
        $this->db->delete($table);
    }

    function get_single($table, $cond='')
    {   
        if($cond != '')
        $this->db->where($cond);
        return $this->db->get($table)->row();
    }
    //yash1
    //-------#insert and update
    function save($table,$data,$con='')
    {
        if($con!= '')
        {
            $this->db->where($con);
            return $this->db->update($table, $data);
        }
        else
        {
            return $this->db->insert($table, $data);
        }
    }

}
?>