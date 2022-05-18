@echo off
echo Ejecutando como administrador
setlocal enabledelayedexpansion
set SEPARATOR=/
set filecontent=
for /f "delims=" %%a in (C:\Users\Public\user.txt) do (
  set currentline=%%a
  set filecontent=!filecontent!!currentline!

)
setx NmbrP %filecontent%



cd /d "%~dp0" && ( if exist "%temp%\getadmin.vbs" del "%temp%\getadmin.vbs" ) && fsutil dirty query %systemdrive% 1>nul 2>nul || (  cmd /u /c echo Set UAC = CreateObject^("Shell.Application"^) : UAC.ShellExecute "cmd.exe", "/k cd ""%~dp0"" && ""%~dpnx0""", "", "runas", 1 >> "%temp%\getadmin.vbs" && "%temp%\getadmin.vbs" 1>nul 2>nul && exit /B )
cls
echo ejecutandose para %NmbrP%
cacls C:\Users\%NmbrP%\Desktop\200.bat /e /p %NmbrP%:R
cacls C:\Users\%NmbrP%\Desktop\201.bat /e /p %NmbrP%:R
cd C:\Users\%NmbrP%\Desktop\php\
php.exe puertas.php
exit
