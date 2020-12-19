//初めに以下の知識を習得してください
//セレクタの取得
//要素(青文字)      $('要素名')
//クラス(オレンジ)  $('.クラス名')
//id               $('#id名')

// li要素内のactiveクラスを持つ要素のインデックス番号を取得
//$('li').index($('.active'));

//jsはhtmlの本文の後に指定しないと有効いならないので注意

$(function(){
    $(".open").click(function(){
      $("#slideBox").slideToggle("slow");
    });
});