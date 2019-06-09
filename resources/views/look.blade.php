<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
{{--<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<!-- Styles -->
    {{--<link href="'{{asset('css/app.css')}}" rel="stylesheet">--}}
    <style>
        .alarm{
            background-color:green;
        }
        .warning{
            background-color:red;
        }
    </style>
</head>
<body>
<div class="content" id="app">

</div>

<div class="alarm" v-bind:class="{warning:isplay}">
    <div v-show="isplay ? false :true">
        <h1>没有新订单</h1>
    </div>
    <div v-show="isplay">
        <h1>新订单:</h1>
        <ul style="text-align:left;">
            {{--<li v-for="(info,index) in infos">--}}
                        {{--<span>--}}
                            {{--@{{ index }} :@{{ info }}--}}
                        {{--</span>--}}
            {{--</li>--}}
            <li>@{{ infos }}</li>
        </ul>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ mix('js/app.js') }}"></script>--}}
{{--<script src="{{mix('js/app.js')}}"></script>--}}
<script>

    var vm =new Vue({
        el:'.alarm',
        data:{
            isplay:false,
            infos:null
        },
        methods:{
            getInfo:function(message) {
                this.isplay = true;
                this.infos = message;
            },
            reduction:function(){
                this.isplay=false;
                this.infos=[];
            }
        }
    });

    Echo.channel('OrderRemind.1')
        .listen('OrderRemind',(e)=>{
        console.log(e);
    vm.getInfo(e);
    });
</script>
</body>
</html>
