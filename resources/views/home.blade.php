@extends('layouts.app')

@section('content')

<div id="matchzone">

<div v-if="pagest">
<div v-for="mylog in mslogs">
@{{ mylog.name }} : 
@{{ mylog.comment }}</br>
</div>
<textarea v-model="msob"></textarea>
<button @click="messageSend()">送信</button>
<button @click="endChat()">チャット終了</button>
</div>
<div v-else class="matching-menu">
<button @click="messageChange()">@{{ matchst }}</button>
</div>
</div>

@endsection


@section('js')

<script>
var matchzone = new Vue({
  el: '#matchzone',
  data: {
  matchst:'マッチング',
  mycou:0,
  pagest:'',
  counter:10,
  roomid:-1,
  msob:'ddd',
  mslogs:[]
},
  methods:{
    messageChange(){
    if(this.matchst=='マッチング'){
      this.matchst='マッチング中';
      $.ajax({
        url: "gomatch/",
        dataType: "json",
        success: data => {
            console.log(data);
        },
        error: () => {
            alert("ajax Error");
        }
    });
    }
    else{
      this.matchst='マッチング';
      $.ajax({
        url: "byematch/",
        dataType: "json",
        success: data => {
            console.log(data);
        },
        error: () => {
            alert("ajax Error");
        }
    });
    }
  },

  messageSend(){
    if(this.msob!='')
    $.ajax({
        url: "result/mssend/",
        data: { name: "John", location: "Boston",message: this.msob,roomid: matchzone.roomid},
        dataType: "json",
        success: data => {
            },
        error: () => {
            alert("ajax Error");
        }
    });
    this.msob='';
  },

  endChat(){
    $.ajax({
        url: "result/mssend/",
        data: { name: "John", location: "Boston",message: 'チャットを終了しました(自動送信)',roomid: matchzone.roomid},
        dataType: "json",
        success: data => {
            },
        error: () => {
            alert("ajax Error");
        }
    });
    this.roomid=-1;
    this.pagest='';
    this.msob='';
    this.mslogs=[];
  }
}
})



$(function() {
    get_data();
});

function get_data() {
    if(matchzone.matchst=='マッチング中'){
    $.ajax({
        url: "result/ajax/",
        dataType: "json",
        success: data => {
            //console.log(typeof(data));
            //console.log(Object.keys(data));
            console.log(Object.keys(data["status"]));
            var iddd=data["status"][0]['room_id'];
            console.log(iddd);
            if(iddd!=-1){
              matchzone.matchst='マッチング';
              matchzone.pagest='ok';
              matchzone.roomid=iddd;
            }
            },
        error: () => {
            alert("ajax Error");
        }
    });
  }
    setTimeout("get_data()", 1000);
}




$(function() {
    get_msdata();
});

function get_msdata() {
    if(matchzone.pagest=='ok'){
    $.ajax({
        url: "result/message/",
        dataType: "json",
        data: { name: "John", location: "Boston",roomid: matchzone.roomid},
        success: data => {
            console.log(typeof(data));
            console.log(Object.keys(data));
            console.log(data["message"]);
            matchzone.mslogs=data["message"];
        },
        error: () => {
            alert("ajax Error");
        }
    });
  }
  setTimeout("get_msdata()", 1000);
}


</script>


@endsection


@section('aaaaaaaa')
<div>いいはは</div>
@endsection