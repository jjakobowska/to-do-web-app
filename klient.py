'''
Po odpaleniu należy szybko przejść (w ciągu 10s) do okna w którym otwarta
jest aplikacja w wybranej przeglądarce
'''

import pyautogui
import time
import keyboard

time.sleep(5)

link = 'http://localhost/to-do-list/'
pyautogui.typewrite(link)
pyautogui.typewrite('\n')
time.sleep(10) 

f = open("shrek.txt", 'r')
for word in f:
    pyautogui.keyDown('tab')
    pyautogui.keyUp('tab')
    pyautogui.typewrite(word)
    pyautogui.keyDown('\n')
    pyautogui.keyUp('\n')

      
