#-*- coding: utf-8 -*-

#import cgi
#import cgitb
# cgitb.enable()
# print("Content-type: text/html;charset=utf-8\r\n")

from googleapiclient.discovery import build
from googleapiclient.errors import HttpError
from oauth2client.tools import argparser
from urllib import parse
import sys
import base64
import html

DEVELOPER_KEY = 'AIzaSyBLHTgYFKJrDIW7UwVzmmQleTmEnBukESo'
YOUTUBE_API_SERVICE_NAME = 'youtube'
YOUTUBE_API_VERSION = 'v3'

youtube = build(YOUTUBE_API_SERVICE_NAME, YOUTUBE_API_VERSION, developerKey=DEVELOPER_KEY)

user_input = ''

for i in range(1, len(sys.argv)):
    user_input += parse.unquote(sys.argv[i]) + ' '

print(user_input)

with open('debug.txt', 'w+') as f:
        f.write('1:'+user_input)

user_input = html.unescape(user_input)
user_input = user_input.replace('+', ' ')
    
with open('debug.txt', 'w+') as f:
        f.write('2:'+user_input)

search_response = youtube.search().list(
    q = user_input,
    order = "relevance",
    part = "snippet",
    maxResults = 10
    ).execute()

videos = []
for search_result in search_response.get('items', []):
    if search_result['id']['kind'] == 'youtube#video':
        string = '%s (%s)' % (search_result['snippet']['title'], search_result['id']['videoId'])
        string = string.replace('&#39;', "'")
        string = string.rsplit(' (', 1)
        videos.append(string[0])
        videos.append(string[1].rsplit(')')[0])


with open('./youtube_list.txt', 'w+', encoding='utf-8') as file:
    string = ''
    for video in videos:
        string += video + '\n'
    file.write(string)

