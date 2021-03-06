<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
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
        console.log('1'+e);
    vm.getInfo(e);
    });
    const socket = io('{{ Request::getHost() }}:6001');
    socket.on('connect', function(data){
        onlineFlag = true;
        console.log(data + ' - connect');
    });
    socket.on('connect_error', function(data){
        console.log(data + ' - connect_error');
    });
    socket.on('connect_timeout', function(data){
        console.log(data + ' - connect_timeout');
    });
    socket.on('reconnect', function(data){
        console.log(data + ' - reconnect');
    });
</script>
</body>
</html>
