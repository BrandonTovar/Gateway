@echo off

echo Creando archivos necesarios
setx NmbrP %USERNAME%
echo %USERNAME% > C:\Users\Public\user.txt
cd C:\Users\%NmbrP%\Desktop\php\ && php.exe cRunAs.php
