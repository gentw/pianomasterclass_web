<?php
namespace App\Services;

/**
 * 
 */
class AfrikaEventService {
	

	public function changeDateFormat($date) {
		$date=date_create($date);
        date_time_set($date,13,24);
        $d = date_format($date,"F Y");  

        return $d;
	}

	public function sortMonths($time1, $time2) {
        if (strtotime($time1) < strtotime($time2)) 
            return -1; 
        else if (strtotime($time1) > strtotime($time2))  
            return 1; 
        else
            return 0; 
    }

    public function tripiPerDateRange($start_date, $end_date) {
    	// The start date
        $begin = new \DateTime($start_date);
        // The end date
        $end = new \DateTime($end_date);
        $end = $end->modify( "+1 month" );
        // The period P1M = period 1 month
        $interval = new \DateInterval('P1M');
        // Get the range as an array
        $daterange = new \DatePeriod($begin, $interval ,$end);

        return $daterange;
    }
}