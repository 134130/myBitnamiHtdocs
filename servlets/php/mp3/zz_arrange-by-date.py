import os
import datetime as d
import shutil as s





filenames = os.listdir('./')
date = str(d.date.today()).replace('-', '')

if date not in filenames:
    os.mkdir('./' + date + '/')


for filename in filenames:
    ext = os.path.splitext(filename)[-1]
    if ext == '.mp3':
        s.move('./'+filename, './'+date+'/'+filename)
