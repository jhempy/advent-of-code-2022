<?php

class rucksack
{
	const NUMBER_COMPARTMENTS = 2;

    public $compartments = [];
    public $all = [];

	function __construct( $contents = '' ) {
        
        // create compartments
        for ( $i=1; $i<=self::NUMBER_COMPARTMENTS; $i++ )
        {
        	$this->compartment[$i] = [];
        }

        // fill compartments
    	$comp = str_split($contents, strlen($contents)/self::NUMBER_COMPARTMENTS);
    	foreach ($comp as $i=>$c)
    	{
			$this->compartment[$i+1] = array_count_values(str_split($c));
    	}

    	// this is a cheat because I'm lazy and don't want to figure out how to add
    	// the compartments together and preserve counts...which I don't even need
    	// for Day03
    	$this->all = array_count_values(str_split($contents));

    }


    // print a rucksack
    public function print() 
    {
    	foreach ($this->compartment as $c)
    	{
    		print_r($c);
    	}
    }

    // show contents of a compartment
    public function compartment( $number = 1 ) 
    {
        return $this->compartment[ $number ];
    }

    // show contents of rucksack
    public function all() 
    {
        return $this->all;
    }



}





?>