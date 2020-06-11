<?php
namespace lib;
trait setDate
{
    public function setDate($date)
    {
        $monthesArr = [
            '01' => 'يناير',
            '02' => 'فبراير',
            '03' => 'مارس',
            '04' => 'ابريل',
            '05' => 'مايو',
            '06' => 'يونيو',
            '07' => 'يوليو',
            '08' => 'أغسطس',
            '09' => 'سبتمبر',
            '10' => 'أكتوبر',
            '11' => 'نوفمبر',
            '12' => 'ديسمبر'
        ];
        $dateArr = explode('-',$date);
        return [$dateArr,$monthesArr];
    }    
    public function setDateGer($date)
    {
        $monthesArr = [
            '01' => 'Januar',
            '02' => 'Februar',
            '03' => 'März',
            '04' => 'April',
            '05' => 'Mai',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'August',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Dezember'
        ];
        $dateArr = explode('-',$date);
        return [$dateArr,$monthesArr];
    }
}