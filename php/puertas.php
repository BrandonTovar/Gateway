<?php 
$cAdmin = get_current_user();
$p1=readline("Ingresa la primera puerta de enlace: ");
$p2=readline("Ingresa la segunda puerta de enlace: ");

$user = fopen("C:\Users\Public\user.txt", "r");
$user=fgets($user);
$user=trim($user);

$nPE1=substr($p1, -3);
$nPE2=substr($p2, -3);

echo " - ".$p1;
echo "\r\n";
echo " - ".$nPE1;
echo "\r\n";
echo " - ".$p2;
echo "\r\n";
echo " - ".$nPE2;


$fp = fopen("C:/Users/$cAdmin/Desktop/$nPE1.bat","w");
fwrite($fp, '
@echo off
rem comando para iniciarse como administrador
cd /d "%~dp0" && ( if exist "%temp%\getadmin.vbs" del "%temp%\getadmin.vbs" ) && fsutil dirty query %systemdrive% 1>nul 2>nul || (  cmd /u /c echo Set UAC = CreateObject^("Shell.Application"^) : UAC.ShellExecute "cmd.exe", "/k cd ""%~dp0"" && ""%~dpnx0""", "", "runas", 1 >> "%temp%\getadmin.vbs" && "%temp%\getadmin.vbs" 1>nul 2>nul && exit /B )
rem ejecutandose como administrador
echo Cambiando puerta de enlace '.$nPE1.'
setlocal
setlocal enabledelayedexpansion
rem throw away everything except the IPv4 address line 
for /f "usebackq tokens=*" %%a in (`ipconfig ^| findstr /i "ipv4"`) do (
  rem we have for example "IPv4 Address. . . . . . . . . . . : 192.168.42.78"
  rem split on : and get 2nd token
  for /f delims^=^:^ tokens^=2 %%b in ("echo %%a") do (
    rem we have " 192.168.42.78"
    rem split on . and get 4 tokens (octets)
    for /f "tokens=1-4 delims=." %%c in ("%%b") do (
      set _o1=%%c
      set _o2=%%d
      set _o3=%%e
      set _o4=%%f
      rem strip leading space from first octet
      set _3octet=!_o1:~1!.!_o2!.!_o3!.!_o4!
      set _ipv4=!_o1:~1!.!_o2!.!_o3!.!_o4!
      )
    )
  )

chcp 65001
netsh interface ipv4 set address "Conexión de red inalámbrica" static !_ipv4! 255.255.255.0 '.$p1.'

endlocal

exit

');
fclose($fp);


$fp = fopen("C:/Users/$cAdmin/Desktop/$nPE2.bat","w");
fwrite($fp, '
@echo off
rem comando para iniciarse como administrador
cd /d "%~dp0" && ( if exist "%temp%\getadmin.vbs" del "%temp%\getadmin.vbs" ) && fsutil dirty query %systemdrive% 1>nul 2>nul || (  cmd /u /c echo Set UAC = CreateObject^("Shell.Application"^) : UAC.ShellExecute "cmd.exe", "/k cd ""%~dp0"" && ""%~dpnx0""", "", "runas", 1 >> "%temp%\getadmin.vbs" && "%temp%\getadmin.vbs" 1>nul 2>nul && exit /B )
rem ejecutandose como administrador
echo Cambiando puerta de enlace '.$nPE2.'
setlocal
setlocal enabledelayedexpansion
rem throw away everything except the IPv4 address line 
for /f "usebackq tokens=*" %%a in (`ipconfig ^| findstr /i "ipv4"`) do (
  rem we have for example "IPv4 Address. . . . . . . . . . . : 192.168.42.78"
  rem split on : and get 2nd token
  for /f delims^=^:^ tokens^=2 %%b in ("echo %%a") do (
    rem we have " 192.168.42.78"
    rem split on . and get 4 tokens (octets)
    for /f "tokens=1-4 delims=." %%c in ("%%b") do (
      set _o1=%%c
      set _o2=%%d
      set _o3=%%e
      set _o4=%%f
      rem strip leading space from first octet
      set _3octet=!_o1:~1!.!_o2!.!_o3!.!_o4!
      set _ipv4=!_o1:~1!.!_o2!.!_o3!.!_o4!
      )
    )
  )

chcp 65001
netsh interface ipv4 set address "Conexión de red inalámbrica" static !_ipv4! 255.255.255.0 '.$p2.'
endlocal

exit

');
fclose($fp);

//Accesos bat

$fp = fopen("C:/Users/$user/Desktop/Puerta de enlace $nPE2.bat","w");
fwrite($fp, "
@echo off
Set apr=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
cls
@%apr:~14,1%%apr:~12,1%%apr:~17,1%%apr:~24,1% %apr:~24,1%%apr:~15,1%%apr:~15,1%
%apr:~28,1%%apr:~29,1%%apr:~10,1%%apr:~27,1%%apr:~29,1% %apr:~38,1%:\%apr:~56,1%%apr:~28,1%%apr:~14,1%%apr:~27,1%%apr:~28,1%\%apr:~51,1%%apr:~30,1%%apr:~11,1%%apr:~21,1%%apr:~18,1%%apr:~12,1%\%apr:~39,1%%apr:~24,1%%apr:~12,1%%apr:~30,1%%apr:~22,1%%apr:~14,1%%apr:~23,1%%apr:~29,1%%apr:~28,1%/$nPE2.vbs
%apr:~14,1%%apr:~33,1%%apr:~18,1%%apr:~29,1%
");
fclose($fp);

$fp = fopen("C:/Users/$user/Desktop/Puerta de enlace $nPE1.bat","w");
fwrite($fp, "
@echo off
Set apr=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
cls
@%apr:~14,1%%apr:~12,1%%apr:~17,1%%apr:~24,1% %apr:~24,1%%apr:~15,1%%apr:~15,1%
%apr:~28,1%%apr:~29,1%%apr:~10,1%%apr:~27,1%%apr:~29,1% %apr:~38,1%:\%apr:~56,1%%apr:~28,1%%apr:~14,1%%apr:~27,1%%apr:~28,1%\%apr:~51,1%%apr:~30,1%%apr:~11,1%%apr:~21,1%%apr:~18,1%%apr:~12,1%\%apr:~39,1%%apr:~24,1%%apr:~12,1%%apr:~30,1%%apr:~22,1%%apr:~14,1%%apr:~23,1%%apr:~29,1%%apr:~28,1%/$nPE1.vbs
%apr:~14,1%%apr:~33,1%%apr:~18,1%%apr:~29,1%

");


$fp = fopen("C:\Users\Public\Documents/$nPE2.vbs","w");
fwrite($fp, '
Set WshShell = WScript.CreateObject("WScript.Shell")
WshShell.run "runas /user:'.$cAdmin.' /savedcred ""cmd /k cd C:/Users/'.$cAdmin.'/Desktop/ && '.$nPE2.'.bat && exit"""
WScript.Sleep 500 
WshShell.SendKeys "Admin2013.{ENTER}"
');
fclose($fp);

$fp = fopen("C:\Users\Public\Documents/$nPE1.vbs","w");
fwrite($fp, '
Set WshShell = WScript.CreateObject("WScript.Shell")
WshShell.run "runas /user:'.$cAdmin.' /savedcred ""cmd /k cd C:/Users/'.$cAdmin.'/Desktop/ && '.$nPE1.'.bat && exit"""
WScript.Sleep 500 
WshShell.SendKeys "Admin2013.{ENTER}"
');

system("icacls C:\Users\%NmbrP%\Desktop\Puerta de enlace $nPE1.bat /e /p %NmbrP%:R");
system("icacls C:\Users\%NmbrP%\Desktop\Puerta de enlace $nPE2.bat /e /p %NmbrP%:R");


fclose($fp);
unlink("C:\Users\Public\user.txt");
unlink("C:\Users\Public\admin.bat");
system(pause);

?>