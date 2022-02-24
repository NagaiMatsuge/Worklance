<div class="col-lg-4 order-lg-2 order-1 mb-lg-0 mb-4">
    <div class="announcement">
        <div class="overlay"></div>
        <div class="top-title">
            <h6><img src="{{ asset('data/img/bell.svg') }}" alt=""> Уведомления</h6>
            <!--<a href="">Архив</a>-->
        </div>
        @foreach (Auth()->user()->messages as $message)
        <?php $user = Auth()->user()->fromUser($message->from_user_id) ?>
            
       
        <div class="d-flex align-items-center flex-column justify-content-between mt-3">
            <div class="d-flex w-100 justify-content-between" style="cursor: pointer" data-toggle="collapse" data-target="#message{{ $message->id }}">
                <div class="d-flex">
                    <img class="announcement-image mr-2" 
                    src="{{$user->avatar ? asset($user->avatar) : asset('data/img/Ellipse.png')}}" alt="">
                    <div class="announcement-text">
                        <p>{{ $user->name }}</p>
                        <p>Отправил Вам сообщение | <span>{{ $message->created_at }}</span></p>
                    </div>
                </div>
                <button type="button" class="read-btn"><img src="{{ asset('data/img/ChevronDown.svg') }}" alt=""></button>
            </div>
            <div id="message{{ $message->id }}" class="collapse">
                <p>
                    {{ $message->text }}
                </p>
                <a href="{{ route('deleteMessage', ['id' => $message->id]) }}" class="mark-as-read-btn">Отметить как прочитанное</a>
            </div>
        </div>
        @endforeach
    </div>
</div>