##Author:   Drew D. Lenhart
##Desc:     Runs stphpschedule commands in a loop
## **Make sure your php path/to/executable is correct if PHP is not in environment variables (Windows).
## e.g.  cmd = "c:\path\to\php.exe -f stphpschedule.php check"

import subprocess
import time 

while True:
    try:
        cmd = "php -f stphpschedule.php check"
        p = subprocess.Popen(cmd, stdout=subprocess.PIPE, stderr=subprocess.PIPE, shell=True)
        print ("Checking queue php script..")
        print (p)
        time.sleep(15)
        exe = "php -f stphpschedule.php execute"
        p = subprocess.Popen(exe, stdout=subprocess.PIPE, stderr=subprocess.PIPE, shell=True)
        time.sleep(5)
    except Exception as e:
        print (e)
        print ("Something happened!")
