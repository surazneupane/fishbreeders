<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReactAction extends Component {

    public $item;
    public $likes;
    public $dislikes;

    public function liked() {
        // TODO : check user existing interaction(like) with item if exist remove otherwise add
           $questionorAnswer = $this->item;
           $vote = $questionorAnswer->votes()->where('user_id',Auth::id())->first();
           if($vote)
           {
               
               $voteCount = $vote->vote_count;
               if($voteCount == 1)
               {
                $vote->vote_count = 0;
               }
               else{
                 $vote->vote_count = 1;

               }

              $vote->update();
           }
           else{
              $vote = new Vote();
              $vote -> user_id =Auth::id();
              $vote->vote_count =1;
              $questionorAnswer->votes()->save($vote);
           }
           $this->likes =  $questionorAnswer->votes()->where('vote_count',1)->count();
           $this->dislikes =  $questionorAnswer->votes()->where('vote_count',-1)->count();
           


     

    }
    public function disliked() {
        // TODO : check user existing interaction(dislike) with item if exist remove otherwise add
        $questionorAnswer = $this->item;
           $vote = $questionorAnswer->votes()->where('user_id',Auth::id())->first();
           if($vote)
           {
               
               $voteCount = $vote->vote_count;
               
               if($voteCount == -1)
               {
                $vote->vote_count = 0;
               }
               else{
                 $vote->vote_count = -1;

               }

              $vote->update();
           }
           else{
              $vote = new Vote();
              $vote -> user_id =Auth::id();
              $vote->vote_count =-1;
              $questionorAnswer->votes()->save($vote);
           }
           $this->dislikes =  $questionorAnswer->votes()->where('vote_count',-1)->count();
           $this->likes =  $questionorAnswer->votes()->where('vote_count',1)->count();
           
        }

    public function render() {
        return view('livewire.react-action');
    }
}
