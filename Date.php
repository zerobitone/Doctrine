<?php

class Date
{
    protected $year;
    protected $month;
    protected $day;
    
    public function __construct()
    {
        $this->setYear(date('Y'));
        $this->setMonth(date('m'));
        $this->setDay(date('d'));
    }

    public function __toString()
    {
        return sprintf(
            '%04d-%02d-%02d',
            $this->year,
            $this->month,
            $this->day
        );
    }

    /**
     * @param mixed $year
     * @return Date
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @param mixed $month
     * @return Date
     */
    public function setMonth($month)
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @param mixed $day
     * @return Date
     */
    public function setDay($day)
    {
        $this->day = $day;
        return $this;
    }

}

$date = new Date();
$date
    ->setYear(1970)
    ->setMonth(12)
    ->setDay(3)
;
echo $date;

/*
$date1 = new Date(array('year' => 1970, 'month' => 1, 'day' => 1));
echo $date1 . '<hr>';
$date2 = new Date(array('year' => 1970, 'month' => 1)); // ohne Tag
echo $date2 . '<hr>';
$date3 = new Date(array('year' => 1970, 'day' => 1)); // ohne Monat
echo $date3 . '<hr>';
$date4 = new Date(array('month' => 1, 'day' => 1)); // ohne Jahr
echo $date4 . '<hr>';
*/

/*
$date1 = new Date(1970, 1, 1);
echo $date1 . '<hr>';
$date1a = new Date();
echo $date1a . '<hr>';
$date2 = new Date(1970, 1); // ohne Tag
echo $date2 . '<hr>';
$date3 = new Date(1970, null, 1); // ohne Monat
echo $date3 . '<hr>';
$date4 = new Date(null, 1, 1); // ohne Jahr
echo $date4 . '<hr>';
*/