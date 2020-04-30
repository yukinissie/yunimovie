<?php


//convert.php
shell_exec("ffmpeg -i ../../movie/admin/MyProject.mov -pix_fmt yuv420p ../../movie/admin/output9.mp4");
header('Location: notice.php?convert=success');