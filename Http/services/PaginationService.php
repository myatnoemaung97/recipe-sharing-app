<?php

namespace Http\services;

class PaginationService
{
    public function pages($items, $itemsPerPage) {
        return ceil(count($items) * 1.0 / $itemsPerPage);
    }
}