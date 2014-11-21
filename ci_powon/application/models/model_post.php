<?php
class Model_post extends CI_Model{

    function getAllPosts() {
        $sql = "SELECT * FROM `post`";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getAllThreadPosts($thread_id) {
        $sql = "SELECT  post.content, post.date, post.author_id, post.thread_id, member.username
                FROM `post`  INNER JOIN `member`  WHERE post.thread_id = '$thread_id'
                AND post.author_id = member.powon_id ORDER BY post.post_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    // still needs to check group id of related thread to get it
//    function getAllGroupPosts($group_id) {
//        $sql = "SELECT powon_id, date, content FROM post
//                WHERE group_id = '$group_id'";
//        $query = $this->db->query($sql);
//        return $query->result();
//    }

//    function getAllMembersGroupThreads($powon_id) {
//        $sql = "SELECT thead_name, thread_id FROM thread
//                WHERE powon_id = '$powon_id'";
//        $query = $this->db->query($sql);
//        return $query->result();
//    }

    function getPostInfo($post_id) {
        $sql = "SELECT post.content, post.date, post.author_id, post.thread_i, member.username
                FROM `post`  INNER JOIN `member`  ON post_id = '$post_id'
                AND post.author_id = member.powon_id ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function insertNewPost($postData) {
        $this->db->insert("post",$postData);
        return $this->db->insert_id();
    }


    function deleteThread($postData) {
        $this->db->delete("post",$postData);
    }
}