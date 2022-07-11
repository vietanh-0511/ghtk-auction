<?php

namespace App\Services\Bid;

class CreateBidAction
{
    private $bidPriceChecker;

    private $updateWinner;

    public function __construct(
        BidPriceChecker $bidPriceChecker,
        UpdateWinner $updateWinner
    ) {
        $this->bidPriceChecker = $bidPriceChecker;
        $this->updateWinner = $updateWinner;
    }

    public function handle(array $request)
    {
        if (!$this->bidPriceChecker->handle($request)) {
            throw new BidPriceException('Không thỏa mãn giá lớn nhất');
        }

        $bid = Bid::create($request);

        $this->updateWinner->handle($bid);
    }
}
