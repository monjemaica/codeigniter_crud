<?php

namespace App\Models;

use CodeIgniter\Model;

class Students_model extends Model
{
    public function getStudentRecords()
    {
        $sql = "SELECT * FROM students
 		WHERE is_deleted = :is_deleted:";
        $query = $this->db->query($sql, ['is_deleted' => '0']);
        $results = $query->getResultArray();

        foreach ($results as $result) {
            $data[] = [
                "id" => $result['id'],
                "first_name" => $result['first_name'],
                "last_name" => $result['last_name'],
                "address" => $result['address'],
                "email" => $result['email'],
                "mobile" => $result['mobile'],
                "is_deleted" => $result['is_deleted']
            ];
        }
        return $data;
    }

    public function insertRecord($postData)
    {
        $sql = "INSERT INTO students (`first_name`, `last_name`,`address`, `email`, `mobile`, `is_deleted`) 
		VALUES (:first_name:, :last_name:, :address:, :email:, :mobile:, :is_deleted:)";

        $add = $this->db->query($sql, [
            'first_name' => $postData['fname'],
            'last_name' => $postData['lname'],
            'address' => $postData['address'],
            'email' => $postData['email'],
            'mobile' => $postData['mobile'],
            'is_deleted' => '0',
        ]);
    }

    public function getEditRecord($id)
    {
        $sql = "SELECT * FROM students
        WHERE is_deleted = :is_deleted: AND id = :id:";
        $query = $this->db->query($sql, ['is_deleted' => '0', 'id' => $id]);
        $result = $query->getRowArray();

        $data = [
            "first_name" => $result['first_name'],
            "last_name" => $result['last_name'],
            "address" => $result['address'],
            "email" => $result['email'],
            "mobile" => $result['mobile'],
            "is_deleted" => $result['is_deleted']
        ];

        return $data;
    }

    public function editRecord($postData)
    {
        $sql = "UPDATE `students` SET `first_name`= :first_name:, `last_name`= :last_name:, `address`= :address:, `email`= :email:, `mobile`= :mobile:, `is_deleted`= :is_deleted: WHERE id = :id:";
        $update = $this->db->query($sql, [
            'id' => $postData['id'],
            'first_name' => $postData['fname'],
            'last_name' => $postData['lname'],
            'address' => $postData['address'],
            'email' => $postData['email'],
            'mobile' => $postData['mobile'],
            'is_deleted' => '0'
        ]);
    }

    public function deleteRecord($postData)
    {
        $sql = "UPDATE `students` SET `is_deleted`= :is_deleted: WHERE id = :id:";
        $update = $this->db->query($sql, [
            'id' => $postData['id'],
            'is_deleted' => '1'
        ]);

        return "Success Delete";
    }
}
