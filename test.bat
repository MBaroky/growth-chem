set arg1=%1
cd %arg1%
::del contact.php, index.php, header.php, footer.php, tires.php, wheels.php, batteries.php
for %%i in (*.php) do if not "%%i"=="form.php" del /q "%%i"
for %%i in (*.html) do if not "%%i"=="form.html" ren "%%i" *.php
::ren *.html *.php
@echo off
for %%a in (index.php, contact.php, products.php) do ( 
   :: multi files with comma , seperator
   echo processing "%%a"
   type "%%a"|findrepl "end of header" /E:"start of footer" /O:+1:-1>"%%a.tmp"
   move "%%a.tmp" "%%a" >nul
)
for %%a in (header.php) do (
   echo processing "%%a"
   type "%%a"|findrepl "<!DOCTYPE html>" /E:"end of header" >"%%a.tmp"
   move "%%a.tmp" "%%a" >nul
)
for %%a in (footer.php) do (
   echo processing "%%a"
   type "%%a"|findrepl "start of footer" /E:"</html" >"%%a.tmp"
   move "%%a.tmp" "%%a" >nul
)
:: cd en [uncomment this then duplicate from line 4]
