<?php

while(true){
    exec('app/console peb:velib:update');
    sleep('300'); //500
}