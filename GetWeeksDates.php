function dateRange($Y, $A, $B, $D) {
    $dates = array();
    $step = '+1 week';
    $format = 'Y-m-d';
    $start = date("Y-m-01", strtotime($A . $Y));
    $last = date("Y-m-t", strtotime($B . $Y));
    if (date('l', strtotime($start)) === 'Sunday' || date('l', strtotime($start)) === 'Monday' || date('l', strtotime($start)) === 'Tuesday' || date('l', strtotime($start)) === 'Wednesday' || date('l', strtotime($start)) === 'Thursday' || date('l', strtotime($start)) === 'Friday' || date('l', strtotime($start)) === 'Saturday') {
        $current = strtotime(date("Y-m-d", strtotime($D, strtotime($start))));
    } else {
        $current = strtotime(date("Y-m-d", strtotime('next ' . $D, strtotime($start))));
    }
    $last = strtotime($last);
    while ($current <= $last) {
        $dates[] = date($format, $current);
        $current = strtotime($step, $current);
    }
    return $dates;
}

print_r(dateRange(2016, 'August', 'September', 'Monday'));

Get week dates between given months and year with 4th parameters of week start from any week day.
