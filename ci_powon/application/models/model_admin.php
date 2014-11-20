<?php
class model_Admin extends CI_Model{

    function updateMemberPrivilegeStatus($updateInfo,$powon_id) {
        $this->db->update("member",$updateInfo,"powon_id = $powon_id");
    }

    function deleteMember($memberData) {
        $this->db->delete("member",$memberData);
    }

    function insertNewPublicPost($postData) {
        $this->db->insert("public_post",$postData);
    }

    function getPublicPosts() {
        $sql = "SELECT * FROM public_post INNER JOIN `member`
                ON public_post.admin_id = member.powon_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
