<?php
    /*
        Matthew Costa
        CSCI343
        Exam 1
    */
    
    //import functions.php from public repository
    require_once("../../CSCI343-Public/php/Utilities/functions.php");
    
    //declare variables, query input, and defaults
    $firstName = getValue("firstName", "John");
    $lastName = getValue("lastName", "Doe");
    $atBats = getValue("atBats", 100);
    $hits = getValue("hits", 30);
    $homeRuns = getValue("homeRuns", 5);
    
    //prints name and averages
    echo "
    <html>
        <body>
            <p>Name: $firstName $lastName</p>
            <p>Batting Average: ".battingAve($hits, $atBats)."</p>
            <p>Home run chance: ".hrChance($homeRuns, $atBats)."</p>
        </body>
    </html>
    
    ";
    
    //calculates batting average from hits/times at bat
    function battingAve($h, $ab){
        //protects from divided-by 0
        if($ab > 0)
            $ave = $h/$ab;
        else
            $ave = 0.0;
        //displays average as red if greater than or equal to 0.3    
        if($ave >= 0.3)
            return "<span style = color:red>$ave</span>";    
        //default return    
        return "<span>$ave</span";
    }
    
    //calculates the chance of hitting a home run from home runs/times at bat
    function hrChance($hr, $ab){
        //protects from divided-by 0
        if($ab > 0)
            $ave = $hr/$ab;
        else
            $ave = 0.0;
        //returns the average    
        return "<span>$ave</span";
    }
?>