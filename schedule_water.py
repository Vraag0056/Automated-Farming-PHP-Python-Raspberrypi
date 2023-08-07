import tkinter as tk
from tkinter import *
from tkinter import ttk
from tkinter import messagebox
import os, sys
import mysql.connector

conn = mysql.connector.connect(host='localhost', user='root', password='root', database='automatic_gardening')

def update_data():
    time1.delete(0, tk.END)
    try:
        # print(tree.selection())
        if len(tree.selection()) > 1:
            messagebox.showerror("Bad Select", "Select one subject at a time to update!")
            return

        row = tree.item(tree.selection()[0])['values']
        time1.insert(0, row[0])
        cur = conn.cursor()
        cur.execute(f"DELETE FROM schedule WHERE time= '{row[0]}'")
        cur.execute("commit")
        update_treeview()

    except IndexError:
        messagebox.showerror("Bad Select", "Please select a subject from the list first!")
        return
# remove selected data from databse and treeview
def remove_data():
    if len(tree.selection()) < 1:
        messagebox.showerror("Bad Select", "Please select a subject from the list first!")
        return
    for i in tree.selection():
        # print(tree.item(i)['values'][0])
        cur = conn.cursor()
        cur.execute(f"DELETE FROM schedule WHERE time = '{tree.item(i)['values'][0]}'")
        cur.execute("commit")
        tree.delete(i)
        update_treeview()

def create_treeview():
    tree['columns'] = ('one')
    tree.column("#0", width=0, stretch=tk.NO)
    tree.column("one", width=150, stretch=tk.NO)
    tree.heading('#0', text="")
    tree.heading('one', text="Timing")






def update_treeview():
    for row in tree.get_children():
        tree.delete(row)
    cur = conn.cursor()
    cur.execute("SELECT * FROM schedule")
    cur = list(cur)
    for row in cur:

        tree.insert(
            "",
            0,
            values=(row[1])
        )
    tree.place(x=700, y=100)
# Parse and store data into database and treeview upon clcicking of the add button
def parse_data():
    time_1 = str(time1.get()).upper()


    if time_1 == "":
        time_1 = None

    if time_1 is None:
        messagebox.showerror("Bad Input", "Please fill up all the fields")
        time1.delete(0, tk.END)
        return

    cur = conn.cursor()
    cur.execute(f"insert into schedule (time) values ('{time_1}')")
    cur.execute("commit")
    update_treeview()

    time1.delete(0, tk.END)





root = Tk()
root.title('Add Faculty')
root.geometry('1100x450')
root.configure(bg="#fff")
root.resizable(False,False)

style= ttk.Style()
style.theme_use("alt")
tree = ttk.Treeview(root,height=12)
create_treeview()
update_treeview()

tk.Label(
        root,
        text='List of Faculties',
    fg='black', bg='white', font=('Consolas', 20, 'bold')
    ).place(x=600, y=50)

    # Label2
tk.Label(
        root,
        text='Add/Update Faculty',
        fg='black', bg='white', font=('Consolas', 20, 'bold')
    ).place(x=60, y=50)

# Label4
tk.Label(
    root,
    text='Faculty time_1:',fg='black', bg='white',
    font=('Consolas', 15)
).place(x=60, y=120)

# Entry1
time1 = tk.Entry(
    root,
    font=('Consolas', 15),
    width=20
)
time1.place(x=260, y=120)



    # Button1
B1 = tk.Button(
        root,
        text='Add Faculty',
        font=('Consolas', 12),bg='#57a1f8',fg='white',border=0,
        command=parse_data
    )
B1.place(x=150,y=390)

    # Button2
B2 = tk.Button(
        root,
        text='Update Subject',
        font=('Consolas', 12),bg='#57a1f8',fg='white',border=0,
        command=update_data
    )
B2.place(x=410,y=390)

B3 = tk.Button(
    root,
    text='Delete Subject(s)',
    font=('Consolas', 12),bg='#57a1f8',fg='white',border=0,
    command=remove_data
)
B3.place(x=650, y=390)
Label(root,text='Created By : Divyanshu Jain',bg="#fff").place(x=890,y=420)
root.mainloop()
