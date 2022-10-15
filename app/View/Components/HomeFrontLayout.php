<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HomeFrontLayout extends Component
{
    public $title;
    public $subTitle;
    public $image;
    public $heading;
    public $username;
    public $loggedUser;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $pgTitle = null, $pgSubTitle = null, $image = null, $heading = "site-heading", $username = null )
    {
        $this->title = $pgTitle;
        $this->subTitle = $pgSubTitle;
        $this->image = $image;
        $this->heading = $heading;
        $this->username = $username;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.home-front-layout');
    }
}
