

<!-- ������ -->
<form name="form1" method="post" action="index.php">
    <span>��֤�룺</span>
    <input type="text" name="vc" size="6" />
    <input type="hidden" name="defValidatorCode" />
    <a href="javascript:reCode()">������</a>
    <br />
    <input type="submit" name="submit" value="�ύ" />
</form>

<!-- ��֤��Ķ������� -->
<script type="text/javascript">
function reCode()
{
    /* ��������� */
    var num1=Math.round(Math.random()*10000000);

    /* ��ȡ�������ǰ4���ַ� */
    var num=num1.toString().substr(0,4);

    /* ����ȡ��ֵ���ݵ�ͼ����ҳ */
    document.write("<img name=codeimg src='ValidatorCode.php?code="+num+"'>");

    /* ����ȡֵ�������е������� */
    form1.defValidatorCode.value=num;
}
</script>

<?php
    require_once 'ValidatorCode.php';
?>