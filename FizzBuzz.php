<?php
for ( $i = 1; $i <= 100; $i++ ) {
    if ( $i % 15 == 0 ) {
        print 'FizzBuzz';
      echo nl2br("\n");
    } else if ( $i % 3 == 0 ) {
        print 'Fizz';
        echo nl2br("\n");
    } else if ( $i % 5 == 0 ) {
        print 'Buzz';
        echo nl2br("\n");
    } else {
        print $i;
        echo nl2br("\n");
    }

}
?>
