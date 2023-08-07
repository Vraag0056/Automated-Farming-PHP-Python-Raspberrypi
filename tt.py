from tkinter import *
import os
from threading import Thread
import tkinter as tk
import mysql.connector
import time

def run_ex():
    Thread(target=chk).start()

def run_tm(l1):
    Thread(target=lambda l1=l1:chk_tm(l1)).start()

def chk_tm(l1):
    l1.config(text='Running')
    l1.config(fg="blue")


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

    l3 = tk.Label(
        frame,
        text=cur[0][3],
        fg='black', bg='white', font=('Consolas', 14)
    )
    l3.place(x=240, y=120)
    if cur[0][1]=='stop':
        l1.config(text='Stopped')
        l1.config(fg="red")
    else:
        l1.config(text='Running')
        l1.config(fg="blue")


    if cur[0][2]=='stop':
        l2.config(text='Stopped')
        l2.config(fg="red")
    else:
        l2.config(text='Running')
        l2.config(fg="blue")
    if cur[0][3]=='stop':
        l3.config(text='Stopped')
        l3.config(fg="red")
    else:
        l3.config(text='Running')
        l3.config(fg="blue")
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

        l3 = tk.Label(
            frame,
            fg='black', bg='white', font=('Consolas', 14)
        )
        l3.place(x=240, y=120)
        if cur[0][1] == 'stop':
            l1.config(text='Stopped')
            l1.config(fg="red")
        else:
            run_tm(l1)
            time.sleep((cur[0][4]) * 60)
            cur1 = conn.cursor()
            cur1.execute(
                f"UPDATE pesticide SET pipe1='stop',time_pipe1='0' WHERE  id= '1' and pipe1='start'")
            cur1.execute("commit")

        if cur[0][2] == 'stop':
            l2.config(text='Stopped')
            l2.config(fg="red")
        else:
            l2.config(text='Running')
            l2.config(fg="blue")

        if cur[0][3] == 'stop':
            l3.config(text='Stopped')
            l3.config(fg="red")
        else:
            l3.config(text='Running')
            l3.config(fg="blue")


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
        text='Pipe 3',
    fg='#57a1f8', bg='white', font=('Consolas', 14, 'bold')
    ).place(x=240, y=70)

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







