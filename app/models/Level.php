<?php

class Level extends Eloquent {
	
	public function skins()
    {
        return $this->hasMany('Skin');
    }
}