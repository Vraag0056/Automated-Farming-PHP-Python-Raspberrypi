from tkinter import *
from threading import Thread
import tkinter as tk
import mysql.connector
import time
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)

RELAIS_1_GPIO = 18    #solenoid 1
GPIO.setup(RELAIS_1_GPIO, GPIO.OUT)
GPIO.output(RELAIS_1_GPIO, GPIO.LOW)

RELAIS_2_GPIO = 11    #solenoid 2
GPIO.setup(RELAIS_2_GPIO, GPIO.OUT)
GPIO.output(RELAIS_2_GPIO, GPIO.LOW)

def run_ex():
    Thread(target=chk).start()

def chk():
    conn = mysql.connector.connect(host='localhost', user='root', password='root', database='farming')
    cur = conn.cursor()
    cur.execute("SELECT * FROM pesticide")
    cur = list(cur)
    l1 = tk.Label(
        frame,
        text=cur[0][1],
        fg='black', bg='white', font=('Consolas', 14)
    )
    l1.place(x=80, y=120)

    l2 = tk.Label(
        frame,
        text=cur[0][2],
        fg='black', bg='white', font=('Consolas', 14)
    )
    l2.place(x=160, y=120)


    if cur[0][1]=='stop':
        l1.config(text='Stopped')
        l1.config(fg="red")
        GPIO.output(RELAIS_1_GPIO, GPIO.HIGH)

    else:
        l1.config(text='Running')
        l1.config(fg="blue")
        GPIO.output(RELAIS_1_GPIO, GPIO.LOW)

        
    if cur[0][2]=='stop':
        l2.config(text='Stopped')
        l2.config(fg="red")
        GPIO.output(RELAIS_2_GPIO, GPIO.HIGH)

    else:
        l2.config(text='Running')
        l2.config(fg="blue")
        GPIO.output(RELAIS_2_GPIO, GPIO.LOW)




    while True:
        time.sleep(5)
        for item in frame.winfo_children():
            item.destroy()
        conn = mysql.connector.connect(host='localhost', user='root', password='root', database='farming')
        cur = conn.cursor()
        cur.execute("SELECT * FROM pesticide")
        cur = list(cur)
        l1 = tk.Label(
            frame,
            fg='black', bg='white', font=('Consolas', 14)
        )
        l1.place(x=80, y=120)

        l2 = tk.Label(
            frame,
            fg='black', bg='white', font=('Consolas', 14)
        )
        l2.place(x=160, y=120)


        if cur[0][1] == 'stop':
            l1.config(text='Stopped')
            l1.config(fg="red")
            GPIO.output(RELAIS_1_GPIO, GPIO.HIGH)

        else:
            l1.config(text='Running')
            l1.config(fg="blue")
            GPIO.output(RELAIS_1_GPIO, GPIO.LOW)


        if cur[0][2] == 'stop':
            l2.config(text='Stopped')
            l2.config(fg="red")
            GPIO.output(RELAIS_2_GPIO, GPIO.HIGH)

        else:
            l2.config(text='Running')
            l2.config(fg="blue")
            GPIO.output(RELAIS_2_GPIO, GPIO.LOW)






root = Tk()

root.title('Choose Option----Vraag')
root.geometry('340x260')
root.configure(bg="#fff")
root.resizable(False,False)



frame = Frame(root,width=350,height=480,bg="white")
frame.place(x=480,y=70)
frame.pack()
heading = Label(root,text='Vraag', fg='#57a1f8',bg='white',font=('Microsoft YaHei UI Light',23,'bold'))
heading.place(x=130,y=5)
tk.Label(
        root,
        text='Pipe 1',
    fg='#57a1f8', bg='white', font=('Consolas', 14, 'bold')
    ).place(x=80, y=70)
tk.Label(
        root,
        text='Pipe 2',
    fg='#57a1f8', bg='white', font=('Consolas', 14, 'bold')
    ).place(x=160, y=70)



tk.Label(
        root,
        text='Status',
    fg='#57a1f8', bg='white', font=('Consolas', 12, 'bold')
    ).place(x=5, y=120)



tk.Button(
    root,
    text='Start',
    font=('Consolas', 12),bg='#57a1f8',fg='white',border=0,
    command=run_ex
).place(x=240,y=160)

root.mainloop()







