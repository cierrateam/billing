<?php

namespace Cierrateam\Billing\Contracts;

Interface BillableContract
{
    /**
     * defindes an array for the position
     * 
     * @return array
     */
    public function toPosition();
    
}
