<?php

namespace Http\services;

use DateTime;

class DateTimeService
{
    public function filter($items, $timeframe) {
        $results = [];
        foreach ($items as $item) {
            if ($this->withinTimeFrame($item['created'], $timeframe)) {
                $results[] = $item;
            }
        }
        return $results;
    }

    public function withinTimeFrame($date, $timeframe) {
        try {
            $date = new DateTime($date);
            $currentDate = new DateTime();
            $timeDifference = $currentDate->diff($date)->days;

            if ($timeDifference <= $timeframe) {
                return true;
            }
        } catch (\Exception $e) {
        }
        return false;
    }
}