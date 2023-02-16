<?php

class admin_model extends CI_Model
{
    
    public function getData($tablename)
    {
         $this->db->order_by("id", "desc");
        $query = $this->db->get($tablename);

        return $query->result();
    }

    public function Delete($id,$tablename)
  {
          $id = $this->db->where('id', $id);

               $this->db->delete($tablename);

  }

    function getSingleData($tablename, $condition)
    {
        $this->db->where($condition);

        return $this->db->get($tablename)->row();
    }

   

    // UPDATE QUERY STATEMENT WITH DYNAMIC TABLE NAME

    function updateData($tableName, $data, $condition)
    {
        $this->db->where($condition);

        $this->db->update($tableName, $data);
    }


 function InsertData($tableName, $data)
    {
        // $this->db->where($condition);

        $this->db->insert($tableName, $data);
    }
    

    

}

?>
