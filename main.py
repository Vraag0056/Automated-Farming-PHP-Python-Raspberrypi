from tkinter import *
import os
from threading import Thread

def run_ex():
    Thread(target=run_ex_t1).start()

def run_ex_t1():
    os.system('py irrigation.py')


def run_send():
    Thread(target=run_send_t1).start()

def run_send_t1():
    os.system('py pesticide.py')

root = Tk()

root.title('Choose Option----Vraag')
root.geometry('340x330')
root.configure(bg="#fff")
root.resizable(False,False)



frame = Frame(root,width=350,height=480,bg="white")
frame.place(x=480,y=70)
heading = Label(root,text='Vraag', fg='#57a1f8',bg='white',font=('Microsoft YaHei UI Light',23,'bold'))
heading.place(x=80,y=5)


Button(root,width=39,pady=7,text = 'Irrigation',bg='#57a1f8',fg='white',border=0,command=run_ex).place(x=30,y=80)
Button(root,width=39,pady=7,text = 'Pesticides',bg='#57a1f8',fg='white',border=0,command=run_send).place(x=30,y=140)

root.mainloop()

