<?php

    //管理员操作

    function checkAdmin($sql)
    {
        return fetchOne($sql);
    }