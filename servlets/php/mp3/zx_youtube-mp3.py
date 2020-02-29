import os
import sys
import subprocess
import youtube_dl
from pydub import AudioSegment


videoIds = []
with open('../href_list.txt', 'r') as file:
    lines = file.readlines()
    for line in lines:
        videoIds.append(line.strip())

ydl_opts = {
        'format': 'bestaudio/best',
        'postprocessors': [{
            'key': 'FFmpegExtractAudio',
            'preferredcodec': 'mp3',
            'preferredquality': '192',
            }, {
            'key': 'FFmpegMetadata'
            },
        ],
    }

with youtube_dl.YoutubeDL(ydl_opts) as ydl:
    for Id in videoIds:
        url = "https://www.youtube.com/watch?v=" + Id
        ydl.download([url])

with open('../href_list.txt', 'w+') as file:
    pass
