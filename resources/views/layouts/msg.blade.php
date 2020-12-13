@if($errors->all())

    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
         @lang('validation.invalid_inputs')  <br>
         <ul>
             @foreach($errors->all() as $error)
             <li>{{$error}}</li>
             @endforeach

         </ul>
    </div>
@endif

@if(Session::get('msg'))
    <?php
            $message=strtolower(substr(Session::get('msg'),2));
            $messageType=strtolower(substr(Session::get('msg'),0,1));

            switch ($messageType)
                {
                case 's':
                    $messageType='success';
                    break;
                case 'd':
                    $messageType='danger';
                    break;
                case 'w':
                    $messageType='warning';
                    break;
                case 'i':
                    $messageType='info';
                    break;
                default:
                    $messageType='primary';
                    break;
            }
    ?>
    <div class="alert alert-{{$messageType}} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{$message}}  <br>

    </div>
@endif