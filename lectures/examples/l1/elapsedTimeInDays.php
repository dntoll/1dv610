<?php


$elapsedTimeInDays = 365;
$daysInAWeek = 7;
$weekIndexSinceStartOfTheCourse = 1;
for ($theFirstDayOfTheWeekIndex = 0; $theFirstDayOfTheWeekIndex < $elapsedTimeInDays; $theFirstDayOfTheWeekIndex += $daysInAWeek, $weekIndexSinceStartOfTheCourse++;) {
	echo "The first day $theFirstDayOfTheWeekIndex of the week $weekIndexSinceStartOfTheCourse we slept, the rest of the week we rested";
}

$d = 365;
$w = 7;
$wi = 1;
for ($i = 0; $i < $d; $i += $w, $wi++) {
	echo "The first day $i of the week $wi we slept, the rest of the week we rested...";
}