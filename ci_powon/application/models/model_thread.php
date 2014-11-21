<?php
class Model_thread extends CI_Model{

    function getAllThreads() {
        $sql = "SELECT * FROM `thread`";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getAllGroupThreads($group_id) {
        $sql = "SELECT name, thread_id FROM thread
                WHERE group_id = '$group_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getAllMembersGroupThreads($powon_id) {
        $sql = "SELECT name, thread_id, group_id FROM thread
                WHERE author_id = '$powon_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getThreadInfo($thread_id) {
        $sql = "SELECT * FROM `thread` WHERE thread_id = '$thread_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getThreadName($thread_id) {
        $sql = "SELECT name FROM `thread` WHERE thread_id = '$thread_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function insertNewThread($threadData) {
        $this->db->insert("thread",$threadData);
        return $this->db->insert_id();
    }


    function deleteThread($threadData) {
        $this->db->delete("thread",$threadData);
    }
}