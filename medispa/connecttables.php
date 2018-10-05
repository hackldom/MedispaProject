<?php
require_once('connect.php');
require_once('header.php');

//query
$result = $mysqli->query("SELECT bookings.date AS bookingDate,
                         newclient.first_name AND newclient.last_name AS name
                         FROM bookings, newclient
                         WHERE bookings.therapist.id = therapist.id
                         ");

SELECT bookings.id AS booking_id, t.name AS therapist_name, nc.first_name AS first_name, nc.last_name AS last_name, tr.name AS treatment_name, tr.duration AS treatment_duration, tr.price AS price
FROM bookings
JOIN therapist AS t
ON bookings.therapist_id = t.id
JOIN treatment  AS tr
ON bookings.treatment_id = tr.id
JOIN newclient AS nc
ON bookings.client_id = nc.id
?>