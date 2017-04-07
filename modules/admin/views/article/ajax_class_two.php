<div class="dropdown" style="float: left; margin-left: 5px;">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
        <span id="text">--请选择--</span>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" id="dropdownMenuone" role="menu" aria-labelledby="dropdownMenu1">
        <?php foreach($cla_list as $val){?>
            <li role="presentation"><a href="#" _i="<?= $val['id'] ?>"><?= $val['name'] ?></a></li>
        <?php }?>
    </ul>
    <input type="hidden" name="Article[class_two_id]" id="class_two_id" value="" />
</div>
<span class="class_two"></span>