<?php

namespace repositories;

use Core\App;
use Core\Database;
use Models\Report;

class ReportRepository
{
    protected Database $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function save(Report $report) {
        $query = "INSERT INTO reports (user_id, content_id, content_type, author_id, report_type, description, date, status) 
                    VALUES (:user_id, :content_id, :content_type, :author_id, :report_type, :description, :date, :status)";
        $this->db->query($query, [
            'user_id' => $report->getUserId(),
            'content_id' => $report->getContentId(),
            'content_type' => $report->getContentType(),
            'author_id' => $report->getAuthorId(),
            'report_type' => $report->getReportType(),
            'description' => $report->getDescription(),
            'date' => $report->getDate(),
            'status' => $report->getStatus()
        ]);
    }

    public function findAll() : array {
        $query = "SELECT * FROM reports";
        return $this->db->query($query)->fetchAll();
    }

    public function findByStatus(String $status) : array {
        $query = "SELECT * FROM reports WHERE status=:status";
        return $this->db->query($query, [
            'status' => $status
        ])->fetchAll();
    }

    public function findById(int $id)
    {
        $query = "SELECT * FROM reports WHERE id=:id";
        return $this->db->query($query, [
            'id' => $id
        ])->fetch();
    }

    public function delete(int $id) {
        $query = "DELETE FROM reports WHERE id=:id";
        $this->db->query($query, [
            'id' => $id
        ]);
    }
}