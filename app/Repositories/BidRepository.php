<?php

namespace App\Repositories;

class BidRepository
{
    public function getBids()
    {
        return Bid::all();
    }
}
