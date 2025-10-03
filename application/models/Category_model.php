<?php
class Category_model extends CI_Model {
    private $table = "categories";

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }



    public function get_category($id)
{
    return $this->db->get_where('categories', array('id' => $id))->row_array();
}

public function update_category($id)
{
    $data = array(
        'name' => $this->input->post('name')
    );

    return $this->db->where('id', $id)->update('categories', $data);
}


public function delete($id) {
    return $this->db->delete('categories', ['id' => $id]);
}

}
