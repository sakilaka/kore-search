<div class="quiz-main-block ml-3">
  <div class="row">
      @php 
          $topics = App\QuizTopic::where('course_id', $course->id)->where('chapter_id', $coursechapter->id)->where('type', NULL)->get();
      @endphp
      
      @if(count($topics)>0 )
      @foreach ($topics as $topic)
      @if($topic->status == 1)

          @if(Auth::User()->role == 'instructor' || Auth::User()->role == 'user')
          <?php 
              $order = App\Order::where('course_id', $course->id)->where('user_id', '=', Auth::user()->id)->first();

              $days = $topic->due_days;
              $orderDate = optional($order)['created_at'];
              

              $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                  $course_id = array();

                  foreach($bundle as $b)
                  {
                      $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                      array_push($course_id, $bundle->course_id);
                  }

                  $course_id = array_values(array_filter($course_id));
                  $course_id = array_flatten($course_id);

                  if($orderDate != NULL){
                      $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                  }
                  elseif(isset($course_id) && in_array($course->id, $course_id)){
                      $startDate = date("Y-m-d", strtotime("$bundle->created_at +$days days"));
                  }
                  else{
                      $startDate = '0';
                  }
          ?>

          @else

          <?php 
              
              $startDate = '0';
          ?>
          @endif


          @php
              $mytime = Carbon\Carbon::now();
          @endphp

          
          
          @if($mytime >= $startDate)
        
          <div class="col-md-6 col-lg-4 p-2">
            <div class="topic-block">
              <div class="card blue-grey darken-1">
                <div class="card-content dark-text">
                  <span class="card-title">{{$topic->title}}</span>
                  <p title="{{$topic->description}}">{{str_limit($topic->description, 120)}}</p>
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <ul class="topic-detail one-topic-detail dark-text" style="color: black;">
                        <li>{{ __('Per Question Mark') }}<i class="fa fa-long-arrow-right"></i></li>
                        <li>{{ __('Total Marks') }}<i class="fa fa-long-arrow-right"></i></li>
                        <li>{{ __('Total Questions') }}<i class="fa fa-long-arrow-right"></i></li>
                        <li>{{ __('Quiz Price') }}<i class="fa fa-long-arrow-right"></i></li>
                      </ul>
                    </div>
                    <div class="col-lg-6 col-5">
                      <ul class="topic-detail two-topic-detail">
                        <li>{{$topic->per_q_mark}}</li>
                        <li>
                          @php
                              $qu_count = 0;
                              $quizz = App\Quiz::get();
                          @endphp
                          @foreach($quizz as $quiz)
                            @if($quiz->topic_id == $topic->id)
                              @php 
                                $qu_count++;
                              @endphp
                            @endif
                          @endforeach
                          {{$topic->per_q_mark*$qu_count}}
                        </li>
                        <li>
                          {{$qu_count}}
                        </li>
                        
                        <li>
                          {{ __('Free') }}
                        </li>

                      </ul>
                    </div>
                  </div>
                </div>


              <div class="card-action text-center">

                @php
                  $users =  App\QuizAnswer::where('topic_id',$topic->id)->where('user_id',Auth::user()->id)->first();
                  $quiz_question =  App\Quiz::where('course_id',$course->id)->get();

                @endphp
                @if(empty($users))
                  @if($quiz_question != null || $quiz_question!= '')
                    
                      <a href="{{route('start_quiz', ['id' => $topic->id])}}" class="btn btn-block" title="Start Quiz"> {{ __('Start Quiz') }}</a>
                  
                  @endif
                @else
                    <a href="{{route('start.quiz.show',$topic->id)}}" class="btn btn-block">{{ __('Show Quiz Report') }} </a>
                  
                  @if($topic->quiz_again == '1')
                    <a href="{{route('tryagain',$topic->id)}}" class="btn btn-block">{{ __('Try Again') }} </a>
                  @endif
                @endif
                  
                </div>
              
              </div>
            </div>
          </div>

          @endif

          
        @endif
        @endforeach
      @else
          
          <div class="learning-quiz-null text-center">
              <div class="col-lg-12">
                  <h1>{{ __('No quiz') }}</h1>
                  <p>{{ __('No quizs detail') }}</p>
              </div>
          </div> 
      @endif
    </div>
</div>