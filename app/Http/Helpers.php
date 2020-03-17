<?php
function calculate_equivalent($result, array $compare = []) {
	if ($result > $compare[0]) {
                return "Above Average";
        }   else if ($result < $compare[1]){
                return "Below Average";
        }   else{
                return "Average";
        }
}