<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/24/14
 * Time: 9:46 PM
 */
class ModelCommonHeader extends Model{
    public function getLinks(){
        /*
         * @return array
         */

        //TODO get meta to show return array;
        $data = array();
        $sql = "select href,rel,type from admin_header_link hl left join setting st on hl.setting = st.setting_id where st.isuse = 1";
        $link = $this->db->query($sql);
        if($link->num_rows == 1){
            $data[0] = $link->row;

        }elseif($link->num_rows > 1){
            foreach ($link->rows as $key => $value){
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function getScripts(){
        $data = array();
        $sql  = "select src,type from admin_header_script hl left join setting st on hl.setting = st.setting_id where st.isuse = 1";
        $result = $this->db->query($sql);
        if($result->num_rows ==1 ){
            $data[0] = $result->row;
        }elseif ($result->num_rows > 1){
            $data = $result->rows;
        }
        return $data;
    }
    public function getMetas(){

    }
}
?>