

<!-- 创建表单 -->
<form name="form1" method="post" action="index.php">
    <span>验证码：</span>
    <input type="text" name="vc" size="6" />
    <input type="hidden" name="defValidatorCode" />
    <a href="javascript:reCode()">看不清</a>
    <br />
    <input type="submit" name="submit" value="提交" />
</form>

<!-- 验证码的二次生成 -->
<script type="text/javascript">
function reCode()
{
    /* 生成随机数 */
    var num1=Math.round(Math.random()*10000000);

    /* 截取随机数的前4个字符 */
    var num=num1.toString().substr(0,4);

    /* 将截取的值传递到图像处理页 */
    document.write("<img name=codeimg src='ValidatorCode.php?code="+num+"'>");

    /* 将截取值赋给表单中的隐藏域 */
    form1.defValidatorCode.value=num;
}
</script>

<?php
    require_once 'ValidatorCode.php';
?>