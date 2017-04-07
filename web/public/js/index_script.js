$(function(){

    /*判断右侧栏漂浮*/
    var offset = $('.class-list').offset();
    var class_list_scroll = function(){
        var scrollTop = $(window).scrollTop();
        if (scrollTop > offset.top){
            $('.my-colmd-4').css({"top" : scrollTop + "px"});
        }else{
            $('.my-colmd-4').css({"top" : "132px"});
        }
    };
    if($('.class-list').length > 0) {
        $(window).scroll(function () {
            class_list_scroll();
        });
        class_list_scroll();
    }

    /*搜索判断*/
    $("#submit_search").bind('click', function(){
        $("#form1").submit();
    });
    $("#form1").bind('submit', function(){
        if($("#search").val() == ''){
            $('#myModal').modal('show');//手动显示模态框
            return false;
        }
    });
    /*bootatrap 的模太框 事件
    * 此事件在模态框被隐藏（并且同时在 CSS 过渡效果完成）之后被触发*/
    $('#myModal').on('hidden.bs.modal', function (e) {
        $("#search").focus();
    });

    /*鼠标放上 菜单下拉*/
    $('#dropdown').mouseover(function() {
        $(this).addClass('open');
        $("#backcolor").css({"background-color":"#a63f16"});
    }).mouseout(function() {
        $(this).removeClass('open');
        if($(this).attr("class") != 'active') {
            $("#backcolor").css({"background-color": "#206494"});
        }
    });

    //去掉下拉菜单的点击事件
    $('#backcolor').click(function(e) {
        e.stopPropagation();
    });

    //设置手机端文章描述超出行高显示省略号
    /*var content_excerpt = function() {
        var s_width = $(window).width();
        var s_height = $(window).height();
        if(s_width < s_height){
            $(".box-excerpt-m").height(58);
        }else{
            $(".box-excerpt-m").height(40);
        }

        $(".box-excerpt-m").each(function (i) {
            var divH = $(this).height();
            var $p = $("p", $(this)).eq(0);
            while ($p.outerHeight() > divH) {
                $p.text($p.text().replace(/(\s)*([a-zA-Z0-9]+|\W)(\.\.\.)?$/, "..."));
            };
        });
    };
    content_excerpt();
    $(window).scroll(function () {
        content_excerpt();
    });*/

});


/*百度统计*/
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?5f5938dbd3758b4d905770e790587adb";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();

