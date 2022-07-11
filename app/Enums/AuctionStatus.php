<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use Illuminate\Validation\Rules\Enum as RulesEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AuctionStatus extends RulesEnum
{
    const Pending =   0;
    const Open =   1;
    const End = 2;
}
