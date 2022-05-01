$(function() {
 
    // padding内側の横幅を取得し、変数に格納
    const w = $('.minipicture').width();
   
    // コンソールログに表示
    console.log(w);
 
    const change_W = w * 2 / 3
   
    console.log(change_W);

  jQuery('.minipicture').css('height', change_W);
});