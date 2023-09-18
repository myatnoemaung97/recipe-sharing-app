<?php

namespace Models;

use DateTime;

class Report
{
    protected int $userId;
    protected int $contentId;
    protected String $contentType;
    protected int $authorId;
    protected string $reportType;
    protected string $description;
    protected string $date;
    protected string $status;
    protected string $link;

    public function __construct(int $userId, int $contentId, string $contentType, int $authorId, string $reportType, string $description, String $date, string $status, string $link)
    {
        $this->userId = $userId;
        $this->contentId = $contentId;
        $this->contentType = $contentType;
        $this->authorId = $authorId;
        $this->reportType = $reportType;
        $this->description = $description;
        $this->date = $date;
        $this->status = $status;
        $this->link = $link;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getContentId(): int
    {
        return $this->contentId;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getReportType(): string
    {
        return $this->reportType;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate(): String
    {
        return $this->date;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getLink(): string
    {
        return $this->link;
    }




}