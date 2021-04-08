<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReactAction extends Component {

    public $item;
    public $likes;
    public $dislikes;

    public function liked() {
        // TODO : check user existing interaction(like) with item if exist remove otherwise add
        $this->likes++;
    }
    public function disliked() {
        // TODO : check user existing interaction(dislike) with item if exist remove otherwise add
        $this->dislikes++;
    }

    public function render() {
        return view('livewire.react-action');
    }
}
