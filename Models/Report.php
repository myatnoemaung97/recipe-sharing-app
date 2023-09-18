<?php

namespace Models;

class Report
{
    protected $userId;
    protected $contentId;
    protected $contentType;
    protected $authorId;
    protected $reportType;
    protected $description;
    protected $date;
    protected $status;

    public function __construct($userId, $contentId, $contentType, $authorId, $reportType,$description, $date, $status)
    {
        $this->userId = $userId;
        $this->contentId = $contentId;
        $this->contentType = $contentType;
        $this->authorId = $authorId;
        $this->reportType = $reportType;
        $this->description = $description;
        $this->date = $date;
        $this->status = $status;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getContentId()
    {
        return $this->contentId;
    }

    public function getContentType()
    {
        return $this->contentType;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getReportType()
    {
        return $this->reportType;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }
}