<?php namespace LaravelKorea;

class Carbon extends \Carbon\Carbon {

    protected static $days = array(
        self::SUNDAY    => '일요일',
        self::MONDAY    => '월요일',
        self::TUESDAY   => '화요일',
        self::WEDNESDAY => '수요일',
        self::THURSDAY  => '목요일',
        self::FRIDAY    => '금요일',
        self::SATURDAY  => '토요일'
    );

    protected static $relativeKeywords = array(
        '이',
        '다음',
        '마지막',
        '내일',
        '어제',
        '+',
        '-',
        '첫번째',
        '마지막',
        '전'
    );

    public function diffForHumans(\Carbon\Carbon $other = null)
    {
        $isNow = $other === null;

        if ($isNow) {
            $other = static::now($this->tz);
        }

        $isFuture = $this->gt($other);

        $delta = $other->diffInSeconds($this);

        // 4 weeks per month, 365 days per year... good enough!!
        $divs = array(
            '초' => self::SECONDS_PER_MINUTE,
            '분' => self::MINUTES_PER_HOUR,
            '시간'   => self::HOURS_PER_DAY,
            '일'    => self::DAYS_PER_WEEK,
            '주'   => 4,
            '달'  => self::MONTHS_PER_YEAR
        );

        $unit = '년';

        foreach ($divs as $divUnit => $divValue) {
            if ($delta < $divValue) {
                $unit = $divUnit;
                break;
            }

            $delta = floor($delta / $divValue);
        }

        if ($delta == 0) {
            $delta = 1;
        }

        $txt = $delta . $unit;
        // $txt .= $delta == 1 ? '' : 's';

        if ($isNow) {
            if ($isFuture) {
                return $txt . ' 후';
            }

            return $txt . ' 전';
        }

        if ($isFuture) {
            return $txt . ' 후';
        }

        return $txt . ' 전';
    }

}