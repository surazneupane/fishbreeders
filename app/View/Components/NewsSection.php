<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewsSection extends Component {

    public $title = "";
    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $posts) {
        $this->title = $title;
        $this->posts = $posts->take(5);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('components.news-section');
    }
}
