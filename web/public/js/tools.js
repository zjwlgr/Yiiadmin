// 这里需要制表符来表示空格，而不是用CSS的magin-left属性
// 这是为了确保直接复制和粘贴时的格式(译注：若用margin-left会导致复制时复制不到空白)。


/*Json格式化========================================================*/
window.TAB = "  ";

function IsArray(obj) {

    return obj &&

        typeof obj === 'object' &&

        typeof obj.length === 'number' &&

        !(obj.propertyIsEnumerable('length'));

}

function Process(){

    var json = document.getElementById("RawJson").value;
    if($("#enableU2C").is(':checked') ){
        json = unescape(json.replace(/\\u/gi,'%u'));
    }
    document.getElementById("Canvas").style.display="block";
    var html = "";

    try{

        if(json == "") json = "\"\"";

        var obj = eval("["+json+"]");

        html = ProcessObject(obj[0], 0, false, false, false);

        document.getElementById("Canvas").innerHTML = "<PRE class='CodeContainer'>"+html+"</PRE>";

    }catch(e){

        //alert("JSON语法错误,不能格式化,错误信息:\n"+e.message);
        $('#jsonModal').modal('show');//手动显示模态框
        //document.getElementById("Canvas").innerHTML = "";
    }
}

function ProcessObject(obj, indent, addComma, isArray, isPropertyContent){

    var html = "";

    var comma = (addComma) ? "<span class='Comma'>,</span> " : "";

    var type = typeof obj;



    if(IsArray(obj)){

        if(obj.length == 0){

            html += GetRow(indent, "<span class='ArrayBrace'>[ ]</span>"+comma, isPropertyContent);

        }else{

            html += GetRow(indent, "<span class='ArrayBrace'>[</span>", isPropertyContent);

            for(var i = 0; i < obj.length; i++){

                html += ProcessObject(obj[i], indent + 1, i < (obj.length - 1), true, false);

            }

            html += GetRow(indent, "<span class='ArrayBrace'>]</span>"+comma);

        }

    }else if(type == 'object' && obj == null){

        html += FormatLiteral("null", "", comma, indent, isArray, "Null");

    }else if(type == 'object'){

        var numProps = 0;

        for(var prop in obj) numProps++;

        if(numProps == 0){

            html += GetRow(indent, "<span class='ObjectBrace'>{ }</span>"+comma, isPropertyContent);

        }else{

            html += GetRow(indent, "<span class='ObjectBrace'>{</span>", isPropertyContent);

            var j = 0;

            for(var prop in obj){

                html += GetRow(indent + 1, '<span class="PropertyName">"'+prop+'"</span>: '+ProcessObject(obj[prop], indent + 1, ++j < numProps, false, true));

            }

            html += GetRow(indent, "<span class='ObjectBrace'>}</span>"+comma);

        }

    }else if(type == 'number'){

        html += FormatLiteral(obj, "", comma, indent, isArray, "Number");

    }else if(type == 'boolean'){

        html += FormatLiteral(obj, "", comma, indent, isArray, "Boolean");

    }else if(type == 'function'){

        obj = FormatFunction(indent, obj);

        html += FormatLiteral(obj, "", comma, indent, isArray, "Function");

    }else if(type == 'undefined'){

        html += FormatLiteral("undefined", "", comma, indent, isArray, "Null");

    }else{

        html += FormatLiteral(obj, "\"", comma, indent, isArray, "String");

    }

    return html;

}

function FormatLiteral(literal, quote, comma, indent, isArray, style){

    if(typeof literal == 'string')

        literal = literal.split("<").join("&lt;").split(">").join("&gt;");

    var str = "<span class='"+style+"'>"+quote+literal+quote+comma+"</span>";

    if(isArray) str = GetRow(indent, str);

    return str;

}

function FormatFunction(indent, obj){

    var tabs = "";

    for(var i = 0; i < indent; i++) tabs += window.TAB;

    var funcStrArray = obj.toString().split("\n");

    var str = "";

    for(var i = 0; i < funcStrArray.length; i++){

        str += ((i==0)?"":tabs) + funcStrArray[i] + "\n";

    }

    return str;

}

function GetRow(indent, data, isPropertyContent){

    var tabs = "";

    for(var i = 0; i < indent && !isPropertyContent; i++) tabs += window.TAB;

    if(data != null && data.length > 0 && data.charAt(data.length-1) != "\n")

        data = data+"\n";

    return tabs+data;

}

function EmptyInput() {
    $('#RawJson').val('');
    $('#Canvas').html('<span class="text-muted">JSON Formatted Display Area...</span>');
}



/*Unix时间格式化========================================================*/
function timestamp(){

    setInterval("$('#now_timestamp').val(Math.round(new Date().getTime()/1000));",1000);
    function timestamptostr(timestamp) {
        d = new Date(timestamp * 1000);
        var jstimestamp = (d.getFullYear())+"-"+(d.getMonth()+1)+"-"+(d.getDate())+" "+(d.getHours())+":"+(d.getMinutes())+":"+(d.getSeconds());
        return jstimestamp;
    }
    $('#unixtime').val(Math.round(new Date().getTime()/1000));

    $('#toGMT').click(function(){
        $('#result_GMT').val(timestamptostr($('#unixtime').val()));
    })

    var now_strTime = timestamptostr(Math.round(new Date().getTime()/1000));
    var arr = new Array();
    arr = now_strTime.split(' ');
    YMD = arr[0].split('-');
    HIS = arr[1].split(':');
    $('#year').val(YMD[0]);
    $('#month').val(YMD[1]);
    $('#day').val(YMD[2]);
    $('#hour').val(HIS[0]);
    $('#minute').val(HIS[1]);
    $('#second').val(HIS[2]);

    setInterval(function () {
        var now_strTime = timestamptostr(Math.round(new Date().getTime()/1000));
        var arr = new Array();
        arr = now_strTime.split(' ');
        YMD = arr[0].split('-');
        HIS = arr[1].split(':');
        $('#now_times').val(YMD[0]+'-'+YMD[1]+'-'+YMD[2]+' '+HIS[0]+':'+HIS[1]+':'+HIS[2]);
    },1000);

    $('#toUNIX').click(function(){
        var utime = new Date(Date.UTC($('#year').val(), $('#month').val() - 1, $('#day').val(), $('#hour').val()-8, $('#minute').val(), $('#second').val()));
        $('#result_unix').val(utime.getTime()/1000);
    })
}

$(function(){
    timestamp();
})


/*Md5 加密========================================================*/
/*
 CryptoJS v3.0.2
 code.google.com/p/crypto-js
 (c) 2009-2012 by Jeff Mott. All rights reserved.
 code.google.com/p/crypto-js/wiki/License
 */
var CryptoJS=CryptoJS||function(o,q){var l={},m=l.lib={},n=m.Base=function(){function a(){}return{extend:function(e){a.prototype=this;var c=new a;e&&c.mixIn(e);c.$super=this;return c},create:function(){var a=this.extend();a.init.apply(a,arguments);return a},init:function(){},mixIn:function(a){for(var c in a)a.hasOwnProperty(c)&&(this[c]=a[c]);a.hasOwnProperty("toString")&&(this.toString=a.toString)},clone:function(){return this.$super.extend(this)}}}(),j=m.WordArray=n.extend({init:function(a,e){a=
        this.words=a||[];this.sigBytes=e!=q?e:4*a.length},toString:function(a){return(a||r).stringify(this)},concat:function(a){var e=this.words,c=a.words,d=this.sigBytes,a=a.sigBytes;this.clamp();if(d%4)for(var b=0;b<a;b++)e[d+b>>>2]|=(c[b>>>2]>>>24-8*(b%4)&255)<<24-8*((d+b)%4);else if(65535<c.length)for(b=0;b<a;b+=4)e[d+b>>>2]=c[b>>>2];else e.push.apply(e,c);this.sigBytes+=a;return this},clamp:function(){var a=this.words,e=this.sigBytes;a[e>>>2]&=4294967295<<32-8*(e%4);a.length=o.ceil(e/4)},clone:function(){var a=
        n.clone.call(this);a.words=this.words.slice(0);return a},random:function(a){for(var e=[],c=0;c<a;c+=4)e.push(4294967296*o.random()|0);return j.create(e,a)}}),k=l.enc={},r=k.Hex={stringify:function(a){for(var e=a.words,a=a.sigBytes,c=[],d=0;d<a;d++){var b=e[d>>>2]>>>24-8*(d%4)&255;c.push((b>>>4).toString(16));c.push((b&15).toString(16))}return c.join("")},parse:function(a){for(var b=a.length,c=[],d=0;d<b;d+=2)c[d>>>3]|=parseInt(a.substr(d,2),16)<<24-4*(d%8);return j.create(c,b/2)}},p=k.Latin1={stringify:function(a){for(var b=
        a.words,a=a.sigBytes,c=[],d=0;d<a;d++)c.push(String.fromCharCode(b[d>>>2]>>>24-8*(d%4)&255));return c.join("")},parse:function(a){for(var b=a.length,c=[],d=0;d<b;d++)c[d>>>2]|=(a.charCodeAt(d)&255)<<24-8*(d%4);return j.create(c,b)}},h=k.Utf8={stringify:function(a){try{return decodeURIComponent(escape(p.stringify(a)))}catch(b){throw Error("Malformed UTF-8 data");}},parse:function(a){return p.parse(unescape(encodeURIComponent(a)))}},b=m.BufferedBlockAlgorithm=n.extend({reset:function(){this._data=j.create();
        this._nDataBytes=0},_append:function(a){"string"==typeof a&&(a=h.parse(a));this._data.concat(a);this._nDataBytes+=a.sigBytes},_process:function(a){var b=this._data,c=b.words,d=b.sigBytes,f=this.blockSize,i=d/(4*f),i=a?o.ceil(i):o.max((i|0)-this._minBufferSize,0),a=i*f,d=o.min(4*a,d);if(a){for(var h=0;h<a;h+=f)this._doProcessBlock(c,h);h=c.splice(0,a);b.sigBytes-=d}return j.create(h,d)},clone:function(){var a=n.clone.call(this);a._data=this._data.clone();return a},_minBufferSize:0});m.Hasher=b.extend({init:function(){this.reset()},
        reset:function(){b.reset.call(this);this._doReset()},update:function(a){this._append(a);this._process();return this},finalize:function(a){a&&this._append(a);this._doFinalize();return this._hash},clone:function(){var a=b.clone.call(this);a._hash=this._hash.clone();return a},blockSize:16,_createHelper:function(a){return function(b,c){return a.create(c).finalize(b)}},_createHmacHelper:function(a){return function(b,c){return f.HMAC.create(a,c).finalize(b)}}});var f=l.algo={};return l}(Math);
(function(o){function q(b,f,a,e,c,d,g){b=b+(f&a|~f&e)+c+g;return(b<<d|b>>>32-d)+f}function l(b,f,a,e,c,d,g){b=b+(f&e|a&~e)+c+g;return(b<<d|b>>>32-d)+f}function m(b,f,a,e,c,d,g){b=b+(f^a^e)+c+g;return(b<<d|b>>>32-d)+f}function n(b,f,a,e,c,d,g){b=b+(a^(f|~e))+c+g;return(b<<d|b>>>32-d)+f}var j=CryptoJS,k=j.lib,r=k.WordArray,k=k.Hasher,p=j.algo,h=[];(function(){for(var b=0;64>b;b++)h[b]=4294967296*o.abs(o.sin(b+1))|0})();p=p.MD5=k.extend({_doReset:function(){this._hash=r.create([1732584193,4023233417,
    2562383102,271733878])},_doProcessBlock:function(b,f){for(var a=0;16>a;a++){var e=f+a,c=b[e];b[e]=(c<<8|c>>>24)&16711935|(c<<24|c>>>8)&4278255360}for(var e=this._hash.words,c=e[0],d=e[1],g=e[2],i=e[3],a=0;64>a;a+=4)16>a?(c=q(c,d,g,i,b[f+a],7,h[a]),i=q(i,c,d,g,b[f+a+1],12,h[a+1]),g=q(g,i,c,d,b[f+a+2],17,h[a+2]),d=q(d,g,i,c,b[f+a+3],22,h[a+3])):32>a?(c=l(c,d,g,i,b[f+(a+1)%16],5,h[a]),i=l(i,c,d,g,b[f+(a+6)%16],9,h[a+1]),g=l(g,i,c,d,b[f+(a+11)%16],14,h[a+2]),d=l(d,g,i,c,b[f+a%16],20,h[a+3])):48>a?(c=
                m(c,d,g,i,b[f+(3*a+5)%16],4,h[a]),i=m(i,c,d,g,b[f+(3*a+8)%16],11,h[a+1]),g=m(g,i,c,d,b[f+(3*a+11)%16],16,h[a+2]),d=m(d,g,i,c,b[f+(3*a+14)%16],23,h[a+3])):(c=n(c,d,g,i,b[f+3*a%16],6,h[a]),i=n(i,c,d,g,b[f+(3*a+7)%16],10,h[a+1]),g=n(g,i,c,d,b[f+(3*a+14)%16],15,h[a+2]),d=n(d,g,i,c,b[f+(3*a+5)%16],21,h[a+3]));e[0]=e[0]+c|0;e[1]=e[1]+d|0;e[2]=e[2]+g|0;e[3]=e[3]+i|0},_doFinalize:function(){var b=this._data,f=b.words,a=8*this._nDataBytes,e=8*b.sigBytes;f[e>>>5]|=128<<24-e%32;f[(e+64>>>9<<4)+14]=(a<<8|a>>>
    24)&16711935|(a<<24|a>>>8)&4278255360;b.sigBytes=4*(f.length+1);this._process();b=this._hash.words;for(f=0;4>f;f++)a=b[f],b[f]=(a<<8|a>>>24)&16711935|(a<<24|a>>>8)&4278255360}});j.MD5=k._createHelper(p);j.HmacMD5=k._createHmacHelper(p)})(Math);

function md5encode(){
    $("#estr").val(CryptoJS.MD5($("#str").val()));
}

function Empty() {
    document.getElementById('str').value = '';
    document.getElementById('estr').value = '';
    document.getElementById('str').select();
}

function GetFocus() {
    document.getElementById('str').focus();
}



/*url 编码====================================================*/

function change() {
    var src = jQuery("#content").val();
    jQuery("#content").val(jQuery("#result").val());
    jQuery("#result").val(src);
}
function encode() {
    //  jQuery("#result").val(encodeURIComponent(jQuery("#content").val()));
    jQuery("#result").val(encodeURI(jQuery("#content").val()));
    jQuery("#res2").show();
    jQuery("#result2").val(encodeURIComponent(jQuery("#content").val()));
}
function decode() {
    jQuery("#res2").hide();
    jQuery("#result").val(decodeURIComponent(jQuery("#content").val()));

}

function Empty_url() {
    document.getElementById('content').value = '';
    document.getElementById('result').value = '';
    document.getElementById('result2').value = '';
    document.getElementById('content').select();
}

function GetFocus() {
    document.getElementById('content').focus();
}
