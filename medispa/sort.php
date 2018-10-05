<?php
require_once('connect.php'
);

$therapists = [];
$query2 = "SELECT * FROM `therapist`";
$response = mysqli_query($dbc, $query2);
if($response){
		while($row = mysqli_fetch_array($response)){

			$therapists[$row['name']] = 0;
		}
}
//var_dump($therapists);
$query = "SELECT bookings.id AS booking_id, bookings.date as bookingdate, t.name AS therapist_name, nc.first_name AS first_name, nc.last_name AS last_name, tr.name AS treatment_name, tr.duration AS treatment_duration, tr.price AS price
		FROM bookings
		JOIN therapist AS t
		ON bookings.therapist_id = t.id
		JOIN treatment  AS tr
		ON bookings.treatment_id = tr.id
		JOIN newclient AS nc
		ON bookings.client_id = nc.id
		ORDER BY `bookings`.`id` ASC";

$response = mysqli_query($dbc, $query);
if($response){
		while($row = mysqli_fetch_array($response)){

		$therapists[$row['therapist_name']]++;
		}
}
$labels = [];
$series = [];
foreach ($therapists as $key => $value) {
	$labels[] = $key;
	$series[]  = $value;
}
/* $array = [];

 $q = "SELECT  birth_date FROM newclient";
$response = mysqli_query($dbc, $q);
if($response){
		while($row = mysqli_fetch_array($response)){
			$array[] = $row;

		}
}
*/

$unsorted = array($series); //

function quick_sort($array)
{
	// find array size
	$length = count($array);

	// base case test, if array of length 0 then just return array to caller
	if($length <= 1){
		return $array;
	}
	else{

		// select an item to act as our pivot point, since list is unsorted first position is easiest
		$pivot = $array[0];

		// declare our two arrays to act as partitions
		$left = $right = array();

		// loop and compare each item in the array to the pivot value, place item in appropriate partition
		for($i = 1; $i < count($array); $i++)
		{
			if($array[$i] < $pivot){
				$left[] = $array[$i];
			}
			else{
				$right[] = $array[$i];
			}
		}

		// use recursion to now sort the left and right lists
		return array_merge(quick_sort($left), array($pivot), quick_sort($right));
	}
}

$sorted = quick_sort($series);
var_dump($unsorted);
var_dump($sorted);

?>
